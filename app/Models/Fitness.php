<?php
/**
 * Created by PhpStorm.
 * User: Marinov
 * Date: 26/12/2018
 * Time: 11:40
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Fitness extends Model
{

    use CrudTrait;

    protected $table = 'fitness_squad';

    protected $fillable = [
        'fitness_id',
        'fitness_name'
    ];

}