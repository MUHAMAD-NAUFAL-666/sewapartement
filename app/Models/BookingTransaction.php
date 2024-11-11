<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingTransaction extends Model
{
    //
    protected $fillable = [
        'name',
        'booking_trx_id',
        'phone_number',
        'total_amount',
        'duration',
        'started_at',
        'ended_at',
        'is_paid',
        'office_space_id',
    ];

    public function generateUniquerandoTrxid()
    {
        $prefix = 'FO';
        do {
            $randomString = $prefix . mt_rand(1000,9999);
        } while (BookingTransaction::where('booking_trx_id', $randomString)->exists());

        return $randomString;
    }

    public function officeSpace(): BelongsTo

    {
        return $this->belongsTo(OfficeSpace::class, 'office_space_id');
    }
}
