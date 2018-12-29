<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddSquadFitness extends Migration
{
    protected $fitness_squad = [
	
		300 => "Bronze-Squad",
		301 => "Silver-Squad",
        302 => "Gold-Squad"
        
    ];
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitness_squad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fitness_id');
            $table->string('fitness_name');
        });
        foreach($this->fitness_squad as $id => $name) {
            DB::table('fitness_squad')->insert([
                'fitness_id' => $id,
                'fitness_name' => $name
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
        Schema::drop('fitness_squad');
    }
}
?>