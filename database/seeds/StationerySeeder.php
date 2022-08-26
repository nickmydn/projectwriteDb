<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class StationerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $the_data1=[
            ['name'=>'Colorful Pen1', 'stationery_type_id'=>1, 'price'=>3000, 'stock'=>40, 'description'=>'best pen in da world', 'photo'=>'uploads/pen1.jpg'],
            ['name'=>'Crown Pen1', 'stationery_type_id'=>1, 'price'=>2000, 'stock'=>40, 'description'=>'best pen in da world2', 'photo'=>'uploads/pen2.jpg'],
            ['name'=>'Woodpencil12', 'stationery_type_id'=>2, 'price'=>1000, 'stock'=>20, 'description'=>'cute pencil', 'photo'=>'uploads/pencil1.jpg'],
            ['name'=>'Ruler30', 'stationery_type_id'=>3, 'price'=>2000, 'stock'=>20, 'description'=>'cute ruler', 'photo'=>'uploads/ruler1.jpg'],
            ['name'=>'Ruler22', 'stationery_type_id'=>3, 'price'=>1000, 'stock'=>20, 'description'=>'adorable ruler', 'photo'=>'uploads/ruler2.jpg'],
            ['name'=>'Notebook2', 'stationery_type_id'=>4, 'price'=>10000, 'stock'=>15, 'description'=>'cool notebook', 'photo'=>'uploads/notebook1.jpg'],
            ['name'=>'Notebook33', 'stationery_type_id'=>4, 'price'=>20000, 'stock'=>20, 'description'=>'mountain notebook', 'photo'=>'uploads/notebook2.jpg'],
            ['name'=>'Notebook1', 'stationery_type_id'=>4, 'price'=>23000, 'stock'=>30, 'description'=>'colorful notebook', 'photo'=>'uploads/notebook3.jpg'],
            ['name'=>'Dictionary09', 'stationery_type_id'=>5, 'price'=>4500, 'stock'=>20, 'description'=>'black dictionary', 'photo'=>'uploads/dictionary1.jpg'],
            ['name'=>'Dictionary12', 'stationery_type_id'=>5, 'price'=>4500, 'stock'=>30, 'description'=>'rusty dictionary', 'photo'=>'uploads/dictionary2.jpg'],
            ['name'=>'Smartpen2', 'stationery_type_id'=>6, 'price'=>70000, 'stock'=>10, 'description'=>'tech pen', 'photo'=>'uploads/smartpen1.jpg'],
            ['name'=>'Smartpen1223', 'stationery_type_id'=>6, 'price'=>50000, 'stock'=>20, 'description'=>'black pen', 'photo'=>'uploads/smartpen2.jpg'],
            ['name'=>'Smartpen87', 'stationery_type_id'=>6, 'price'=>80000, 'stock'=>10, 'description'=>'whiteblack pen', 'photo'=>'uploads/smartpen3.jpg'],
            ['name'=>'Smartpencil23', 'stationery_type_id'=>7, 'price'=>20000, 'stock'=>6, 'description'=>'colorful smartpencil', 'photo'=>'uploads/smartpencil1.jpg'],
            ['name'=>'SmartReader54', 'stationery_type_id'=>8, 'price'=>30000, 'stock'=>9, 'description'=>'handy smartreader', 'photo'=>'uploads/smartreader1.jpg'],
            ['name'=>'Smartnote34', 'stationery_type_id'=>9, 'price'=>50000, 'stock'=>55, 'description'=>'cool smartnote', 'photo'=>'uploads/smartnote1.jpg']
        ];

        foreach($the_data1 as $datax){
            DB::table('stationeries')->insert($datax);
        }
    }
}
