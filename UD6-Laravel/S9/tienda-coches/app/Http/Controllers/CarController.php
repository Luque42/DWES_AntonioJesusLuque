<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Feature;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::with(['brand', 'features']); // carga anticipada: evita N+1

        if ($request->filled('q')) {
            $query->where('model', 'like', '%' . $request->input('q') . '%');
        }

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->input('brand_id'));
        }

        $cars = $query->orderBy('model')->paginate(10)->withQueryString();
        $brands = Brand::orderBy('name')->get();

        return view('cars.index', compact('cars', 'brands'));
    }

    public function create()
    {
        return view('cars.create', [
            'car'      => new Car(),
            'brands'   => Brand::orderBy('name')->get(),
            'features' => Feature::orderBy('name')->get(),
        ]);
    }

    public function store(CarRequest $request)
    {
        $data = $request->validated();
        $featureIds = $data['features'] ?? [];
        unset($data['features']);

        $car = Car::create($data);
        $car->features()->sync($featureIds);

        return redirect()
            ->route('cars.show', $car)
            ->with('success', 'Coche creado correctamente.');
    }

    public function show(Car $car)
    {
        $car->load(['brand', 'features']);

        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        $car->load(['brand', 'features']);

        return view('cars.edit', [
            'car'      => $car,
            'brands'   => Brand::orderBy('name')->get(),
            'features' => Feature::orderBy('name')->get(),
        ]);
    }

    public function update(CarRequest $request, Car $car)
    {
        $data = $request->validated();
        $featureIds = $data['features'] ?? [];
        unset($data['features']);

        $car->update($data);
        $car->features()->sync($featureIds);

        return redirect()
            ->route('cars.show', $car)
            ->with('success', 'Coche actualizado correctamente.');
    }

    public function destroy(Car $car)
    {
        $car->features()->detach();
        $car->delete();

        return redirect()
            ->route('cars.index')
            ->with('success', 'Coche eliminado correctamente.');
    }
}