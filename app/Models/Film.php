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

    /**
     * Get all of the comments for the Film
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'film_id', 'id');
    }

    
}
