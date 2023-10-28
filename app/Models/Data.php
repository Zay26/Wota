<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'used_volume',
        'tank_id',
        'remaining_volume',
        'level',
       
       
    ];


    public function tank(){
        return $this->belongsTo(Tank::class,'foreign_key','tank_id');
    }
}
