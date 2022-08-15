<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
