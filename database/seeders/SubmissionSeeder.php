<?php

namespace Database\Seeders;

use App\Models\Submission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=Submission::create([
            'user_id' => 3,
            'from_city_id'=>1,
            'to_city_id'=>2,
            'from_longitude'=>'110.80856207006029',
            'to_longtitude'=>'107.60762330092848',
            'from_latitude'=>'7.551550953636547',
            'to_latitude'=>'6.887769562651903',
            'start_at'=>date('Y/m/d', strtotime('+7 days')),
            'end_at'=>date('Y/m/d' ,strtotime('+9 days')),
            'description'=>'this descrition'
        ]);
            $data=Submission::create([
                'user_id' => 3,
                'from_city_id'=>2,
                'to_city_id'=>1,
                'from_longitude'=>'107.60762330092848',
                'to_longtitude'=>'110.80856207006029',
                'from_latitude'=>'6.887769562651903',
                'to_latitude'=>'7.551550953636547',
                'start_at'=>date('Y/m/d', strtotime('+10 days')),
                'end_at'=>date('Y/m/d', strtotime('+13 days')),
                'description'=>'this description',
        ]);
            $data=Submission::create([
                'user_id' => 3,
                'from_city_id'=>1,
                'to_city_id'=>3,
                'from_longitude'=>'110.80856207006029',
                'to_longtitude'=>'110.98265212141636',
                'from_latitude'=>'-7.551550953636547',
                'to_latitude'=>'-7.561609332579155',
                'start_at'=>date('Y/m/d', strtotime('+13 days')),
                'end_at'=>date('Y/m/d', strtotime('+14 days')),
                'description'=>'this descripito',
        ]);
            $data=Submission::create([
                'user_id' => 3,
                'from_city_id'=>1,
                'to_city_id'=>4,
                'from_longitude'=>'110.80856207006029',
                'to_longtitude'=>'119.49395104728016',
                'from_latitude'=>'-7.551550953636547',
                'to_latitude'=>'-5.130637878858464',
                'start_at'=>date('Y/m/d', strtotime('+15 days')),
                'end_at'=>date('Y/m/d', strtotime('+17 days')),
                'description'=>'this descripito',
        ]);
            $data=Submission::create([
                'user_id' => 3,
                'from_city_id'=>1,
                'to_city_id'=>5,
                'from_longitude'=>'110.80856207006029',
                'to_longtitude'=>'103.86896785676537',
                'from_latitude'=>'-7.551550953636547',
                'to_latitude'=>'1.3538137175535485',
                'start_at'=>date('Y/m/d', strtotime('+21 days')),
                'end_at'=>date('Y/m/d', strtotime('+30 days')),
                'description'=>'this descripito',
        ]);
    }
}
