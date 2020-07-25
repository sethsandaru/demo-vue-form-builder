<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 10/9/2018
 * Time: 8:54 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PageForm extends Model
{
    protected $table = "page_form";

    /**
     * Get Form Mapped with the Current Path
     * @param string $path Override Path
     * @return PageForm|null
     */
    public static function getFormOfCurrentPath($path = null) {
        return self::query()
            ->where('path', $path ?? request()->path())
            ->first();
    }
}
