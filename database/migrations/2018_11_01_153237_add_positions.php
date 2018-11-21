<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddPositions extends Migration
{
    protected $positions = [
        'LWB-LB' => 'LWB > LB',
        'LB-LWB' => 'LB > LWB',
        'RWB-RB' => 'RWB > RB',
        'RB-RWB' => 'RB > RWB',
        'LM-LW' => 'LM > LW',
        'LW-LM' => 'LW > LM',
        'RM-RW' => 'RM > RW',
        'RW-RM' => 'RW > RM',
        'LW-LF' => 'LW > LF',
        'LF-LW' => 'LF > LW',
        'RW-RF' => 'RW > RF',
        'RF-RW' => 'RF > RW',
        'CM-CAM' => 'CM > CAM',
        'CAM-CM' => 'CAM > CM',
        'CM-CDM' => 'CM > CDM',
        'CDM-CM' => 'CDM > CM',
        'CAM-CF' => 'CAM > CF',
        'CF-CAM' => 'CF > CAM',
        'CF-ST' => 'CF > ST',
        'ST-CF' => 'ST > CF'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('position_id');
            $table->string('position_name');
        });
        foreach($this->positions as $id => $name) {
            DB::table('positions')->insert([
                'position_id' => $id,
                'position_name' => $name
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
        Schema::drop('positions');
    }
}
