<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class StationeryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $the_data=[
            ['name'=>'pen', 'photo'=>'uploads/pen.jpg'],
            ['name'=>'pencil', 'photo'=>'uploads/pencil.jpg'],
            ['name'=>'ruler', 'photo'=>'uploads/ruler.jpg'],
            ['name'=>'notebook', 'photo'=>'uploads/notebook.jpg'],
            ['name'=>'dictionary','photo'=>'uploads/dictionary.jpg'],
            ['name'=>'smart pen','photo'=>'uploads/smartpen.jpg'],
            ['name'=>'smart pencil','photo'=>'uploads/smartpencil.jpg'],
            ['name'=>'smart reader','photo'=>'uploads/smartreader.jpg'],
            ['name'=>'smart note','photo'=>'uploads/smartnote.jpg']
        ];

        foreach($the_data as $datax){
            DB::table('stationery_types')->insert($datax);
        }
    }
}
