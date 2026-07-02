<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'member_id',
        'doctor_id',
        'booking_date',
        'booking_time',
        'status',
    ];

    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function consultation()
    {
        return $this->hasOne(Consultation::class);
    }
}