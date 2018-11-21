<?php
/**
 * Created by PhpStorm.
 * User: curtiscrewe
 * Date: 01/11/2018
 * Time: 15:15
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Chemistry extends Model
{

    use CrudTrait;

    protected $table = 'chemistry_styles';

    protected $fillable = [
        'playStyle_id',
        'playStyle_name'
    ];

}