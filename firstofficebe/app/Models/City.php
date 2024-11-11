<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', // Tambahkan properti yang diizinkan untuk mass assignment
        'slug',
        'photo',
        // tambahkan properti lain jika diperlukan
    ];
}
