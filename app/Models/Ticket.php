<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_id',
        'user_id',
        'ticket_num',
        'payment_type',
        'status'
    ];

    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addition()
    {
        return $this->belongsToMany(Addition::class);
    }


}
