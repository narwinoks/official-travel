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
        $city=City::create([
            'city'=>'Karanganyar',
            'province' =>'Jawa Tengah',
            'longitude'=>'110.98265212141636',
            'latitude'=>'-7.561609332579155',
            'island'=>'Jawa',
            'overseas'=>'0'
        ]);
        $city=City::create([
            'city'=>'Makasar',
            'province' =>'Sulawesi Selatan',
            'longitude'=>'119.49395104728016',
            'latitude'=>'-5.130637878858464',
            'island'=>'Sulawesi',
            'overseas'=>'0'
        ]);
        $city=City::create([
            'city'=>'Singapura',
            'province' =>'singapura',
            'longitude'=>'103.86896785676537',
            'latitude'=>'1.3538137175535485',
            'island'=>'Singapura',
            'overseas'=>'1'
        ]);



        
    }
}
