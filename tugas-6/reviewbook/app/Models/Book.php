<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";
    protected $fillable = ["title", "content", 'image', 'genre_id'];
    public function genre()
{
    return $this->belongsTo(Genre::class);
}
public function comments()
{
    return $this->hasMany(Comment::class);
    return $this->hasMany(Comment::class)->onDelete('cascade');
}

}
