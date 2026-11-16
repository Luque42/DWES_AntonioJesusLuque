<?php

namespace App\Http\Requests;

use App\Models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'brand_id'    => ['required', 'integer', 'exists:brands,id'],
            'model'       => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:1000'],
            'price'       => ['required', 'numeric', 'min:0', 'max:99999999.99'],
            'year'        => ['required', 'integer', 'between:1950,' . (now()->year + 1)],
            'mileage'     => ['required', 'integer', 'min:0', 'max:2000000'],
            'fuel'        => ['required', Rule::in(Car::FUELS)],
            'status'      => ['required', Rule::in(Car::STATUSES)],
            'features'    => ['nullable', 'array'],
            'features.*'  => ['integer', 'distinct', 'exists:features,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'string'   => 'El campo :attribute debe ser texto.',
            'integer'  => 'El campo :attribute debe ser un número entero.',
            'numeric'  => 'El campo :attribute debe ser un número.',
            'max'      => 'El campo :attribute es demasiado largo o grande.',
            'min'      => 'El campo :attribute no puede ser menor que :min.',
            'between'  => 'El campo :attribute debe estar entre :min y :max.',
            'in'       => 'El valor elegido para :attribute no es válido.',
            'exists'   => 'El valor elegido para :attribute no existe.',
            'distinct' => 'Hay valores repetidos en :attribute.',
        ];
    }

    public function attributes(): array
    {
        return [
            'brand_id'    => 'marca',
            'model'       => 'modelo',
            'description' => 'descripción',
            'price'       => 'precio',
            'year'        => 'año',
            'mileage'     => 'kilómetros',
            'fuel'        => 'combustible',
            'status'      => 'estado',
            'features'    => 'extras',
            'features.*'  => 'extra',
        ];
    }
}