<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    use HasFactory;
    protected $fillable=['name','price','image' , 'cinema_id'];
    /**
     * The roles that belong to the Addition
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tickets()
    {
        return $this->belongsToMany(Ticket::class);
    }
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
}
