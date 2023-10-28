<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
     public $table = "tank";
    use HasFactory;

    protected $fillable = [
        'company',
        'height',
        'radius',
        'capacity',
        'user_id',
        'current_volume',
       
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }

    public function data(){

        return $this->hasMany('App\Models\Data');
    }
}
