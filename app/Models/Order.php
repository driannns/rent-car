<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',  
        'name',  
        'id_car',  
        'hours',  
        'payment',  
        'price',  
        'endOrder',  
        'status',  
    ];
}
