<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'cinema_location' , 'phone' , 'link' ,  'email' , 'cinema_name' , 'image','user_id' , 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
