<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $primaryKey = 'id';
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'deskripsi',
        'id_category',
        'bbm',
        'harga',
        'picture',
        'status'
    ];
}
