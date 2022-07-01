<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $fillable = ['show_time' , 'price' , 'cinema_id'];
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function shows()
    {
        return $this->hasMany(Show::class);
    }
}
