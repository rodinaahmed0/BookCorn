<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' , 'name' , 'location' , 'owner_phone','image' , 'long' , 'lat'];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function additions()
    {
        return $this->hasMany(Addition::class);
    }

    public function shows()
    {
        return $this->hasMany(Show::class);
    }
    public function times()
    {
        return $this->hasMany(Time::class);
    }

    public function halls()
    {
        return $this->hasMany(Hall::class);
    }

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
