<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteController extends Controller
{
    /**
     * Listado de todas las notas.
     */
    public function index(): JsonResource
    {
        return NoteResource::collection(Note::all());
    }

    /**
     * Almacenar una nueva nota.
     */
    public function store(NoteRequest $request): JsonResponse
    {
        $note = Note::create($request->all());

        return response()->json([
            'success' => true,
            'data' => new NoteResource($note),
        ], 201);
    }

    /**
     * Mostrar una nota específica por su ID.
     */
    public function show(string $id): JsonResource
    {
        $note = Note::find($id);

        return new NoteResource($note);
    }

    /**
     * Actualizar una nota existente.
     */
    public function update(NoteRequest $request, string $id): JsonResponse
    {
        $note = Note::find($id);
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();

        return response()->json([
            'success' => true,
            'data' => new NoteResource($note),
        ], 200);
    }

    /**
     * Eliminar una nota.
     */
    public function destroy(string $id): JsonResponse
    {
        $note = Note::find($id);
        $note->delete();

        return response()->json([
            'success' => true,
        ], 200);
    }
}
