<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city=City::create([
            'city'=>'solo',
            'provinces' =>'Jawa Tengah',
            'island'=>'Jawa',
            'overseas'=>'0'
        ]);
    }
}
