<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class AddSBCModeSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('settings')->insert([
            'key'           => 'account_mode',
            'name'          => 'Account Mode',
            'description'   => 'Mode acccount will be used during cron.',
            'value'         => '0',
            'field'         => '{"name":"value","label":"Value", "title":"Account Mode" ,"type":"select_from_array", "options":{"0":"Autobuyer","1":"SBC"}}',
            'active'        => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
