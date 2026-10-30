<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehiculo extends Model
{
    //
    // protected $table = 'vehiculos';
    // protected $primaryKey = 'codigo';

    // Define qué campos permites registrar masivamente
    protected $fillable = [
        'estacion_id',  // Foreign key to the Estacion model
        'modelo',
        'tipo',
        'disponible',
    ];

    public function estacion(): BelongsTo
    {
        return $this->belongsTo(Estacion::class);
    }
}
