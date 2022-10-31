<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [

            //koffie machines

            ['name' => "Barroc Intens Italian Light",
            'description' => "",
            'image_path' => "/images/fotos/barroc-intens-italian-light.jpg",
            'brand' => "",
            'price' => "499",
            'install_price' => "289",
            'category_id' => "1",
            'created_at' => now(),
            'updated_at' => now(),],

            ['name' => "Barroc Intens Italian",
            'description' => "",
            'image_path' => "",
            'brand' => "",
            'price' => "599",
            'install_price' => "289",
            'category_id' => "1",
            'created_at' => now(),
            'updated_at' => now(),],

            ['name' => "Barroc Intens Italian Deluxe",
            'description' => "",
            'image_path' => "",
            'brand' => "",
            'price' => "799",
            'install_price' => "375",
            'category_id' => "1",
            'created_at' => now(),
            'updated_at' => now(),],

            //koffie bonen

            ['name' => "Espresso Beneficio",
            'description' => "Een toegankelijke en zachte koffie. Hij is afkomstig van de Finca El Limoncillo, een weelderige plantage aan de rand van het regenwoud in de Matagalpa regio in Nicaragua.",
            'image_path' => "",
            'brand' => "",
            'price' => "21.60",
            'install_price' => "0",
            'category_id' => "2",
            'created_at' => now(),
            'updated_at' => now(),],

            ['name' => "Yellow Bourbon Brasil",
            'description' => "Koffie van de oorspronkelijke koffiestruik (de Bourbon) met gele koffiebessen. Deze zeldzame koffie heeft de afgelopen 20 jaar steeds meer erkenning gekregen en vele prijzen gewonnen.",
            'image_path' => "",
            'brand' => "",
            'price' => "23.20",
            'install_price' => "0",
            'category_id' => "2",
            'created_at' => now(),
            'updated_at' => now(),],

            ['name' => "Espresso Roma",
            'description' => "Een Italiaanse espresso met een krachtig karakter en een aromatische afdronk.",
            'image_path' => "",
            'brand' => "",
            'price' => "20.80",
            'install_price' => "0",
            'category_id' => "2",
            'created_at' => now(),
            'updated_at' => now(),],

            ['name' => "Red Honey Honduras",
            'description' => "De koffie is geproduceerd volgens de honey-methode. Hierbij wordt de koffieboon in haar vruchtvlees gedroogd, waardoor de zoete fruitsmaak diep in de boon trekt. Dit levert een éxtra zoete koffie op.",
            'image_path' => "",
            'brand' => "",
            'price' => "27.80",
            'install_price' => "0",
            'category_id' => "2",
            'created_at' => now(),
            'updated_at' => now(),],
        ];

        DB::table('products')->insert($products);
    }
}
