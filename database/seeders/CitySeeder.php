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
            'province' =>'Jawa Tengah',
            'latitude'=>'-7.551550953636547',
            'longitude'=>'110.80856207006029',
            'island'=>'Jawa',
            'overseas'=>'0'
        ]);
        $city=City::create([
            'city'=>'bandung',
            'province' =>'Jawa Barat',
            'longitude'=>'107.60762330092848',
            'latitude'=>'-6.887769562651903',
            'island'=>'Jawa',
            'overseas'=>'0'
        ]);

        
    }
}
