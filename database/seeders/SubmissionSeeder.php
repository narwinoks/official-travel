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
            'user_id' => 1,
            'from_city_id'=>1,
            'to_city_id'=>2,
            'from_longitude'=>'110.80856207006029',
            'to_longtitude'=>'107.60762330092848',
            'from_latitude'=>'7.551550953636547',
            'to_latitude'=>'6.887769562651903',
            'start_at'=>date('Y/m/d', strtotime('+7 days')),
            'end_at'=>date('Y/m/d' ,strtotime('+9 days')),
            'description'=>'Presentation in java coding solo'
        ]);
            $data=Submission::create([
                'user_id' => 1,
                'from_city_id'=>1,
                'to_city_id'=>2,
                'from_longitude'=>'107.60762330092848',
                'to_longtitude'=>'110.80856207006029',
                'from_latitude'=>'6.887769562651903',
                'to_latitude'=>'7.551550953636547',
                'start_at'=>date('Y/m/d', strtotime('+10 days')),
                'end_at'=>date('Y/m/d', strtotime('+10 days')),
                'description'=>'Presentation in java coding solo',
                'status'=>0    
        ]);
    }
}
