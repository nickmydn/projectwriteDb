<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $the_data=[
            ['name'=>'jian', 'email'=>'jianjia@gmail.com', 'role'=>'admin', 'password'=>bcrypt('indonesia123')],
            ['name'=>'vino', 'email'=>'vinoangga@gmail.com', 'role'=>'member', 'password'=>bcrypt('jakarta123')],
            ['name'=>'elnina', 'email'=>'elnina@gmail.com', 'role'=>'member', 'password'=>bcrypt('elnina123')],
            ['name'=>'lanino', 'email'=>'lanino@gmail.com', 'role'=>'member', 'password'=>bcrypt('lanino123')]
        ];

        foreach($the_data as $datax){
            DB::table('users')->insert($datax);
        }

    }
}
