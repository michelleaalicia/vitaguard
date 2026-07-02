<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'booking_id',
        'status',
    ];
    public function messages()
    {
        return $this->hasMany(ConsultationMessage::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}