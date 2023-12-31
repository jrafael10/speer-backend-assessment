<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{


    use HasFactory;
    protected $fillable = ['title', 'summary', 'content', 'author', 'updated_at', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }





}
