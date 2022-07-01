<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
