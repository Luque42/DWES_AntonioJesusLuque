<?php

namespace App\Models;

use Database\Factories\GeneroFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genero extends Model
{
    /** @use HasFactory<GeneroFactory> */
    use HasFactory;

    protected $fillable = ['nombre'];

    public function videojuegos(): BelongsToMany
    {
        return $this->belongsToMany(Videojuego::class)->withTimestamps();
    }
}
