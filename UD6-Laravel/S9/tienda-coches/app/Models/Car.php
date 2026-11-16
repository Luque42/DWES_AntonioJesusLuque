<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    use HasFactory;

    public const FUELS = ['gasolina', 'diesel', 'hibrido', 'electrico'];
    public const STATUSES = ['disponible', 'reservado', 'vendido'];

    protected $fillable = [
        'brand_id',
        'model',
        'description',
        'price',
        'year',
        'mileage',
        'fuel',
        'status',
    ];

    protected $casts = [
        'price'   => 'decimal:2',
        'year'    => 'integer',
        'mileage' => 'integer',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class);
    }
}