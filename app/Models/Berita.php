<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'photo',
        'author',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
