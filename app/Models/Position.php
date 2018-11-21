<?php
/**
 * Created by PhpStorm.
 * User: curtiscrewe
 * Date: 01/11/2018
 * Time: 15:38
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Position extends Model
{

    use CrudTrait;

    protected $table = 'positions';

    protected $fillable = [
        'position_id',
        'position_name'
    ];

    public function getNameAttribute()
    {
        return $this->position_name;
    }

}