<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_name' =>'Uncategorized',
                'created_at'   =>date('Y-m-d H:i:s'),
                'updated_at'   =>date('Y-m-d H:i:s')
            ],
            [
                'category_name' =>'Billing/Payments',
                'created_at'   =>date('Y-m-d H:i:s'),
                'updated_at'   =>date('Y-m-d H:i:s')
            ],
            [
                'category_name' =>'Technical questions',
                'created_at'   =>date('Y-m-d H:i:s'),
                'updated_at'   =>date('Y-m-d H:i:s')
            ]
        ]);
    }
}
