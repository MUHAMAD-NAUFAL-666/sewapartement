<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class OfficeSpace extends Model
{
    //
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name', // Tambahkan properti yang diizinkan untuk mass assignment
        'thumbnail',
        'is_open',
        'is_full_booked',
        'price',
        'duration',
        'address',
        'about',
        'city_id',
        'slug',
        'photo',
        // tambahkan properti lain jika diperlukan
    ];
    public function setNameAttribute($value)
    {
        $this->attributes['name'] =$value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(OfficeSpacePhoto::class);
    }

    public function benefits(): HasMany
    {
        return $this->hasMany(OfficeSpaceBenefit::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
