<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['genre_id','judul','tahun','deskripsi','image'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
