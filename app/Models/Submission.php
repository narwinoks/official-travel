<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $with=['FromCity','ToCity','User'];


    public function FromCity(){
        return $this->belongsTo(City::class,'from_city_id','id');
    }
    public function ToCity(){
        return $this->belongsTo(City::class,'to_city_id','id');
    }
    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
