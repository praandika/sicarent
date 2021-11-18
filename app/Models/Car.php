<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\Damage;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function booking(){
        return $this->hasMany(Booking::class);
    }

    public function damage(){
        return $this->hasMany(Damage::class);
    }
}
