<?php

namespace Database\Seeders;

use App\Models\products;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products =
            ['name' => "Barroc Intens Italian Light",
            'description' => "Barroc Intens Italian Light test desciption",
            'image_path' => "/test/img/barroc-intens-italian-light.jpg",
            'price' => "499",
            'instal_price' => "289",
            'category_id' => "1",];

        DB::table('products')->insert($product);
    }
}
