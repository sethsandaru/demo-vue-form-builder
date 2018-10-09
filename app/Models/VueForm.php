<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 10/9/2018
 * Time: 8:54 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class VueForm extends Model
{
    protected $table = "VueForm";
    protected $primaryKey = "ID";
    public $timestamps = false;
    public static $snakeAttributes = false;

    public function children() {
        return $this->hasMany(VueFormData::class, 'VueFormID');
    }

    public function latest_child() {
        return VueFormData::byVersion($this->Version)->byVueForm($this->ID)->first();
    }

    /**
     * Insert a brand new form config data
     * @param $title
     * @param $data
     */
    public static function insert_data($title, $data) {
        $form = new self;
        $form->Title = $title;
        $form->Version = 1;
        $form->CreatedDate = $form->ModifiedDate = now();
        $form->save();

        // insert first child
        VueFormData::insert_data($form->ID, $data, $form->Version);

        return $form->ID;
    }

    public static function update_data($id, $title, $data) {
        $form = self::find($id);
        if (empty($form)) {
            return false;
        }

        // update form
        $form->Title = $title;
        $form->Version++;
        $form->save();

        // insert new child form data (keep old child to track history of course lol)
        VueFormData::insert_data($form->ID, $data, $form->Version);

        return $form->ID;
    }
}