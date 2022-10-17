<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $product_catogory = [
            ['name' => 'koffiesetapparaat','is_employee_only' => 0],
            ['name' => 'koffiebonen','is_employee_only' => 0],
        ];
        DB::table('product_categories')->insert($product_catogory);
    }
}