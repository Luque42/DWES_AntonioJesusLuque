<?php

namespace App\Models;

use Database\Factories\DesarrolladoraFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Desarrolladora extends Model
{
    /** @use HasFactory<DesarrolladoraFactory> */
    use HasFactory;

    protected $fillable = ['nombre', 'pais', 'fundacion'];

    public function videojuegos(): HasMany
    {
        return $this->hasMany(Videojuego::class);
    }
}
