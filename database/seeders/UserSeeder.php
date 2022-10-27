<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model=User::create([
            'username' =>'winarno',
            'password' =>Hash::make('password')
        ]);
        $model->attachRole(1);
        // $model=User::create([
        //     'username' =>'admin',
        //     'password' =>Hash::make('password')
        // ]);
        // $model->attachRole(3);
    }
}
