<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class evs_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$i=0;
    	while($i<5)
    	{
	        DB::table('rename_evs_table_user')->insert([
	            'name' => Str::random(10),
	            'number' => 1
	        ]);
	        $i++;
    	}
    }
}
