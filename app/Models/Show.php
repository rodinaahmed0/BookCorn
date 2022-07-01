<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;
    protected $fillable = ['cinema_id' , 'time_id' , 'hall_id' , 'movie_id' , 'date'];
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
}
