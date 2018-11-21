<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddChemistryStyles extends Migration
{
    protected $chemistry_styles = [
        250 => 'Basic',
        251 => 'Sniper',
        252 => 'Finisher',
        253 => 'Deadeye',
        254 => 'Marksman',
        255 => 'Hawk',
        256 => 'Artist',
        257 => 'Architect',
        258 => 'Powerhouse',
        259 => 'Maestro',
        260 => 'Engine',
        261 => 'Sentinel',
        262 => 'Guardian',
        263 => 'Gladiator',
        264 => 'Backbone',
        265 => 'Anchor',
        266 => 'Hunter',
        267 => 'Catalyst',
        268 => 'Shadow',
        269 => 'Wall',
        270 => 'Shield',
        271 => 'Cat',
        272 => 'Glove',
        273 => 'GK Basic'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chemistry_styles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('playStyle_id');
            $table->string('playStyle_name');
        });
        foreach($this->chemistry_styles as $id => $name) {
            DB::table('chemistry_styles')->insert([
                'playStyle_id' => $id,
                'playStyle_name' => $name
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chemistry_styles');
    }
}
