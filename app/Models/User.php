<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Doctor;
use App\Models\Article;
use App\Models\Booking;
use App\Models\ConsultationMessage;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function bookingsAsMember()
    {
        return $this->hasMany(Booking::class, 'member_id');
    }

    public function bookingsAsDoctor()
    {
        return $this->hasMany(Booking::class, 'doctor_id');
    }

    public function consultationMessages()
    {
        return $this->hasMany(ConsultationMessage::class, 'sender_id');
    }
}
