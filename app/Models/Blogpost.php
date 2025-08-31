<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blogpost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'country',
        'description',
        'duration',
        'rating',
        'image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
