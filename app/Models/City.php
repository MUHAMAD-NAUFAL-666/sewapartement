<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Str;

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
    public function setNameAttribute($value)
    {
        $this->attributes['name'] =$value;
        $this->attributes['slug'] =Str::slug($value);
    }
    public function officeSpaces(): HasMany
    {
        return $this->hasMany(OfficeSpace::class);
    }
}
