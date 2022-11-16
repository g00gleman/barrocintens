<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [

            //companies

            [
                'id' => "1",
                'name' => "curio",
                'phone' => "088-2099157",
                'street' => "Knipplein",
                'HouseNumber' => "11",
                'city' => "Roosendaal",
                'CountryCode' => "31",
                'check' => "1",
                'BkrCheckedAt' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => "2",
                'name' => "INSTALLATIEBEDRIJF ADAMS",
                'phone' => "085-0260600",
                'street' => "Elementweg",
                'HouseNumber' => "1",
                'city' => "Roosendaal",
                'CountryCode' => "31",
                'check' => "1",
                'BkrCheckedAt' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => "3",
                'name' => "Truck & Carwarsh van Osta",
                'phone' => "0165-575050",
                'street' => "Atoomweg",
                'HouseNumber' => "18",
                'city' => "Roosendaal",
                'CountryCode' => "31",
                'check' => "1",
                'BkrCheckedAt' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => "4",
                'name' => "Kuijpers | Technisch dienstverlener in Roosendaal",
                'phone' => "0165-573000",
                'street' => "Ettenseweg",
                'HouseNumber' => "62",
                'city' => "Roosendaal",
                'CountryCode' => "31",
                'check' => "0",
                'BkrCheckedAt' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('companies')->insert($companies);
    }
}
