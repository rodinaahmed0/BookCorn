<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;
    protected $fillable = ['number' , 'seats' , 'cinema_id'];

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function shows()
    {
        return $this->hasMany(Show::class);
    }
}
