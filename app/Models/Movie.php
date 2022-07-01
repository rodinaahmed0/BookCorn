<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'description' , 'trailer_link' , 'language' , 'duration' , 'category_id', 'cinema_id' , 'image'];
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function shows()
    {
        return $this->hasMany(Show::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
