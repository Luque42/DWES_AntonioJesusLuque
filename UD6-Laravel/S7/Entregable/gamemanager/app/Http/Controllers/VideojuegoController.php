<?php

namespace App\Http\Controllers;

use App\Models\Desarrolladora;
use App\Models\Genero;
use App\Models\Videojuego;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class VideojuegoController extends Controller
{
    public function index(Request $request): View
    {
        $videojuegos = Videojuego::with(['desarrolladora', 'generos'])
            ->when($request->filled('buscar'), fn ($query) => $query->where('titulo', 'like', '%'.$request->string('buscar')->toString().'%'))
            ->when($request->filled('genero_id'), fn ($query) => $query->whereHas('generos', fn ($generos) => $generos->whereKey($request->input('genero_id'))))
            ->when($request->filled('desarrolladora_id'), fn ($query) => $query->where('desarrolladora_id', $request->input('desarrolladora_id')))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('videojuegos.index', [
            'videojuegos' => $videojuegos,
            'generos' => Genero::orderBy('nombre')->get(),
            'desarrolladoras' => Desarrolladora::orderBy('nombre')->get(),
        ]);
    }

    public function create(): View
    {
        return view('videojuegos.create', [
            'desarrolladoras' => Desarrolladora::orderBy('nombre')->get(),
            'generos' => Genero::orderBy('nombre')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $datos = $this->validar($request);
        $datos['publicado'] = $request->boolean('publicado');

        $videojuego = Videojuego::create(Arr::only($datos, [
            'titulo',
            'descripcion',
            'anio',
            'precio',
            'publicado',
            'desarrolladora_id',
        ]));

        $videojuego->fichaTecnica()->create(Arr::only($datos, [
            'plataforma',
            'motor_grafico',
            'edad_recomendada',
            'espacio_gb',
            'modo_juego',
        ]));
        $videojuego->generos()->attach($datos['generos']);

        return redirect()->route('videojuegos.index')->with('mensaje', 'Videojuego creado correctamente.');
    }

    public function show(Videojuego $videojuego): View
    {
        $videojuego->load(['desarrolladora', 'fichaTecnica', 'generos']);

        return view('videojuegos.show', compact('videojuego'));
    }

    public function edit(Videojuego $videojuego): View
    {
        $videojuego->load(['fichaTecnica', 'generos']);

        return view('videojuegos.edit', [
            'videojuego' => $videojuego,
            'desarrolladoras' => Desarrolladora::orderBy('nombre')->get(),
            'generos' => Genero::orderBy('nombre')->get(),
        ]);
    }

    public function update(Request $request, Videojuego $videojuego): RedirectResponse
    {
        $datos = $this->validar($request);
        $datos['publicado'] = $request->boolean('publicado');

        $videojuego->update(Arr::only($datos, [
            'titulo',
            'descripcion',
            'anio',
            'precio',
            'publicado',
            'desarrolladora_id',
        ]));
        $videojuego->fichaTecnica()->updateOrCreate(
            ['videojuego_id' => $videojuego->id],
            Arr::only($datos, ['plataforma', 'motor_grafico', 'edad_recomendada', 'espacio_gb', 'modo_juego'])
        );
        $videojuego->generos()->sync($datos['generos']);

        return redirect()->route('videojuegos.show', $videojuego)->with('mensaje', 'Videojuego actualizado correctamente.');
    }

    public function destroy(Videojuego $videojuego): RedirectResponse
    {
        $videojuego->delete();

        return redirect()->route('videojuegos.index')->with('mensaje', 'Videojuego eliminado correctamente.');
    }

    private function validar(Request $request): array
    {
        return $request->validate([
            'titulo' => ['required', 'string', 'max:200'],
            'descripcion' => ['required', 'string'],
            'anio' => ['required', 'integer', 'between:1970,2030'],
            'precio' => ['required', 'numeric', 'min:0', 'max:9999.99'],
            'desarrolladora_id' => ['required', 'exists:desarrolladoras,id'],
            'generos' => ['required', 'array', 'min:1'],
            'generos.*' => ['exists:generos,id'],
            'plataforma' => ['required', 'string', 'max:150'],
            'motor_grafico' => ['required', 'string', 'max:150'],
            'edad_recomendada' => ['required', 'integer', 'in:3,7,12,16,18'],
            'espacio_gb' => ['required', 'integer', 'min:1'],
            'modo_juego' => ['required', 'string', 'max:100'],
        ]);
    }
}
