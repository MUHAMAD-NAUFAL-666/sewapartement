<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeSpace extends Model
{
    //
    
    protected $fillable = [
        'name', // Tambahkan properti yang diizinkan untuk mass assignment
        'slug',
        'photo',
        // tambahkan properti lain jika diperlukan
    ];
}
