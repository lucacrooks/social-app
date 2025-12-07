<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image', 'caption',];

    public function user()
    {
        return $this->belongsTo(User::class);//relation to user model
    }

    public function comments()
    {
    return $this->hasMany(Comment::class)->latest();//relation to comment model
    }
}
