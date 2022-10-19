<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'film_id', 'name'];

    /**
     * Get the user that owns the Ulasan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
