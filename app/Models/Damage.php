<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Damage extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function car(){
        return $this->belongsTo(Car::class);
    }
}
