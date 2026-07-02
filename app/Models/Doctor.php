<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'user_id',
        'specialization',
        'phone',
        'photo',
        'description',
        'available_days',
        'available_start',
        'available_end',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}