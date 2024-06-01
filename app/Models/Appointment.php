<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected $casts = [
        'appointment_date' => 'datetime:Y-m-d H:i:00'
    ];


    public function user()
    {
        return $this->hasOne(User::class);
    }
}
