<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([ProductSeeder::class]);
        $this->call([ProductCategorieSeeder::class]);
        $this->call([UserSeeder::class,]);
        $this->call([CompanySeeder::class,]);

        $faker = Faker::create('nl_NL');
            foreach (range(1, 150) as $value) {
                DB::table('companies')->insert([
                    'name' => $faker->name,
                    'phone' => $faker->phoneNumber,
                    'street' => $faker->streetAddress,
                    'HouseNumber' => $faker->numberBetween(1, 200),
                    'city' => $faker->city,
                    'CountryCode' => $faker->countryCode,
                    'BkrCheckedAt' => now(),
                ]);
            }

            $faker = Faker::create('nl_NL');
            foreach (range(1, 75) as $value) {
                DB::table('werkbons')->insert([
                    'company_id' => $faker->numberBetween(1, 150),
                    'user_id' => "1",
                    'description' => $faker->text(400),
                    'materials' => $faker->text(60),
                    'created_at' => $faker->date(),
                ]);
            }

            $faker = Faker::create('nl_NL');
            foreach (range(1, 150) as $value) {
                DB::table('leases')->insert([
                    'company_id' => $faker->numberBetween(1, 150),
                    'total_price' => $faker->numberBetween(200, 1000),
                    'weken' => $faker->numberBetween(5, 52),
                    'dagen' => $faker->numberBetween(60, 800),
                    'duur' => $faker->numberBetween(150, 1000),
                    'updated_at' => $faker->date(),
                    'created_at' => $faker->date(),
                ]);
            }

            $faker = Faker::create('nl_NL');
            foreach (range(1, 500) as $value) {
                DB::table('invoices')->insert([
                    'leases_id' => $faker->numberBetween(1, 150),
                    'company_id' => $faker->numberBetween(1, 150),
                    'total_price' => "0",
                    'created_at' => $faker->date(),
                ]);
            }

            $faker = Faker::create('nl_NL');
            foreach (range(1, 1000) as $value) {
                DB::table('invoice_products')->insert([
                    'invoice_id' => $faker->numberBetween(1, 100),
                    'product_id' => $faker->numberBetween(1, 7),
                    'amount' => $faker->numberBetween(1, 4500)
                ]);
            }
    }
}
