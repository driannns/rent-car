<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',  
    ];

    public function car()
    {
        return $this->belongsToMany(Car::class);
    }

    public function cars() {
        return $this->hasMany(Car::class);
        }
}
