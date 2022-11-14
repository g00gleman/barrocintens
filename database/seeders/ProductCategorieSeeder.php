<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            //categories

            //machines
            [
                'id' => "1",
                'name' => "machines",
                'is_employee_only' => "0",
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //bonen
            [
                'id' => "2",
                'name' => "bonen",
                'is_employee_only' => "0",
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //onderdelen
            [
                'id' => "3",
                'name' => "onderdelen",
                'is_employee_only' => "0",
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ];

        DB::table('product_categories')->insert($categories);
    }
}
