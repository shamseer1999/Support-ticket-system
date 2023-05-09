<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->insert([
            [
                'label_name' =>'bug',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at' =>date('Y-m-d H:i:s')
            ],
            [
                'label_name' =>'question',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at' =>date('Y-m-d H:i:s')
            ],
            [
                'label_name' =>'enhancement',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at' =>date('Y-m-d H:i:s')
            ]
        ]);
    }
}
