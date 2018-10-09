<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 10/9/2018
 * Time: 8:54 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class VueFormData extends Model
{
    protected $table = "VueFormData";
    protected $primaryKey = "ID";
    public $timestamps = false;
    public static $snakeAttributes = false;

    public function scopeByVersion($query, $version) {
        return $query->where('Version', $version);
    }

    public function scopeByVueForm($query, $id) {
        return $query->where('VueFormID', $id);
    }

    public static function insert_data($vueFormID, $data, $version) {
        $form_data = new VueFormData;
        $form_data->VueFormID = $vueFormID;
        $form_data->Data = $data;
        $form_data->Version = $version;
        $form_data->save();
    }
}