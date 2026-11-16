<?php

namespace App\Http\Controllers;

use App\Models\Desarrolladora;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DesarrolladoraController extends Controller
{
    public function index(): View
    {
        return view('desarrolladoras.index', [
            'desarrolladoras' => Desarrolladora::withCount('videojuegos')->orderBy('nombre')->get(),
        ]);
    }

    public function create(): View
    {
        return view('desarrolladoras.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Desarrolladora::create($this->validar($request));

        return redirect()->route('desarrolladoras.index')->with('mensaje', 'Desarrolladora creada correctamente.');
    }

    public function edit(Desarrolladora $desarrolladora): View
    {
        return view('desarrolladoras.edit', compact('desarrolladora'));
    }

    public function update(Request $request, Desarrolladora $desarrolladora): RedirectResponse
    {
        $desarrolladora->update($this->validar($request));

        return redirect()->route('desarrolladoras.index')->with('mensaje', 'Desarrolladora actualizada correctamente.');
    }

    public function destroy(Desarrolladora $desarrolladora): RedirectResponse
    {
        if ($desarrolladora->videojuegos()->exists()) {
            return redirect()->route('desarrolladoras.index')
                ->with('error', 'No se puede eliminar una desarrolladora con videojuegos.');
        }

        $desarrolladora->delete();

        return redirect()->route('desarrolladoras.index')->with('mensaje', 'Desarrolladora eliminada correctamente.');
    }

    private function validar(Request $request): array
    {
        return $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'pais' => ['required', 'string', 'max:100'],
            'fundacion' => ['nullable', 'integer', 'between:1800,2026'],
        ]);
    }
}
