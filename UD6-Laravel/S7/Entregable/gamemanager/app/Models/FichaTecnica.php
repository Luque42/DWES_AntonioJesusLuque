<?php

namespace App\Models;

use Database\Factories\FichaTecnicaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FichaTecnica extends Model
{
    /** @use HasFactory<FichaTecnicaFactory> */
    use HasFactory;

    protected $table = 'fichas_tecnicas';

    protected $fillable = [
        'plataforma',
        'motor_grafico',
        'edad_recomendada',
        'espacio_gb',
        'modo_juego',
        'videojuego_id',
    ];

    public function videojuego(): BelongsTo
    {
        return $this->belongsTo(Videojuego::class);
    }
}
