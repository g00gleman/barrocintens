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
            'description' => "de koffiesetapparaat maakt heele goede koffie. en de koffiesetapparaat is gemaakt van goede kwaliteit",
            'image_path' => "machine-bit-light.png",
            'brand' => "Nescafe",
            'price' => "499",
            'amount' => "2150",
            'install_price' => "289",
            'category_id' => "1",
            'created_at' => now(),
            'updated_at' => now(),],

            ['name' => "Barroc Intens Italian",
            'description' => "Geniet van de smaak van echte espresso. Met het Barroc Intens Italian zet je koffie met een hoge druk van tot wel 19 bar. Hierdoor ben je verzekerd van de echte espressokwaliteit.",
            'image_path' => "philips3.png",
            'brand' => "Philips",
            'price' => "599",
            'amount' => "3500",
            'install_price' => "289",
            'category_id' => "1",
            'created_at' => now(),
            'updated_at' => now(),],

            ['name' => "Barroc Intens Italian Deluxe",
            'description' => "Espresso is a concentrated form of coffee served in small, strong shots and is the base for many coffee drinks. It's made from the same beans as coffee but is stronger, thicker, and higher in caffeine.",
            'image_path' => "machine-bit-deluxe.png",
            'brand' => "Espresso",
            'price' => "799",
            'amount' => "6000",
            'install_price' => "375",
            'category_id' => "1",
            'created_at' => now(),
            'updated_at' => now(),],

            //koffie bonen

            ['name' => "Espresso Beneficio",
            'description' => "Een toegankelijke en zachte koffie. Hij is afkomstig van de Finca El Limoncillo, een weelderige plantage aan de rand van het regenwoud in de Matagalpa regio in Nicaragua.",
            'image_path' => "espresso-bonen.png",
            'brand' => "Espresso",
            'price' => "21.60",
            'amount' => "11160",
            'install_price' => "0",
            'category_id' => "2",
            'created_at' => now(),
            'updated_at' => now(),],

            ['name' => "Yellow Bourbon Brasil",
            'description' => "Koffie van de oorspronkelijke koffiestruik (de Bourbon) met gele koffiebessen. Deze zeldzame koffie heeft de afgelopen 20 jaar steeds meer erkenning gekregen en vele prijzen gewonnen.",
            'image_path' => "brasil2.png",
            'brand' => "Bourbon",
            'price' => "23.20",
            'amount' => "9780",
            'install_price' => "0",
            'category_id' => "2",
            'created_at' => now(),
            'updated_at' => now(),],

            ['name' => "Espresso Roma",
            'description' => "Een Italiaanse espresso met een krachtig karakter en een aromatische afdronk.",
            'image_path' => "roma.png",
            'brand' => "Espresso",
            'price' => "20.80",
            'amount' => "0",
            'install_price' => "0",
            'category_id' => "2",
            'created_at' => now(),
            'updated_at' => now(),],

            ['name' => "Red Honey Honduras",
            'description' => "De koffie is geproduceerd volgens de honey-methode. Hierbij wordt de koffieboon in haar vruchtvlees gedroogd, waardoor de zoete fruitsmaak diep in de boon trekt. Dit levert een éxtra zoete koffie op.",
            'image_path' => "red.png",
            'brand' => "Red Honey",
            'amount' => "280",
            'price' => "27.80",
            'install_price' => "0",
            'category_id' => "2",
            'created_at' => now(),
            'updated_at' => now(),],

        ];

        DB::table('products')->insert($products);
    }
}
