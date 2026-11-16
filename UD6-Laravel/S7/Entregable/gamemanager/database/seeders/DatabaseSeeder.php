<?php

namespace Database\Seeders;

use App\Models\Desarrolladora;
use App\Models\FichaTecnica;
use App\Models\Genero;
use App\Models\Videojuego;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $generos = collect([
            'Acción',
            'Aventura',
            'Rol',
            'Estrategia',
            'Deportes',
            'Simulación',
            'Mundo abierto',
            'Plataformas',
        ])->map(fn (string $nombre) => Genero::create(['nombre' => $nombre]));
        $generoIds = $generos->pluck('id')->all();

        $catalogo = [
            [
                'titulo' => 'ARK: Survival Ascended',
                'descripcion' => 'Sobrevive en una isla salvaje poblada por dinosaurios: explora, domestica criaturas y construye una base junto a otros jugadores.',
            ],
            [
                'titulo' => 'Grand Theft Auto: San Andreas – The Definitive Edition',
                'descripcion' => 'CJ regresa a San Andreas y recorre un extenso mundo abierto en una aventura de acción sobre familias, territorio y supervivencia.',
            ],
            [
                'titulo' => 'DRAGON BALL: Sparking! ZERO',
                'descripcion' => 'Lucha en intensos combates tridimensionales con personajes de DRAGON BALL, ataques espectaculares y transformaciones.',
            ],
            [
                'titulo' => 'Rust',
                'descripcion' => 'Reúne recursos, fabrica herramientas y levanta un refugio mientras intentas sobrevivir a la naturaleza y a otros jugadores.',
            ],
            [
                'titulo' => "Queen's Domain",
                'descripcion' => 'Adéntrate en un reino de fantasía oscura, explora peligrosas mazmorras y enfréntate a enemigos en una aventura de acción y rol.',
            ],
            [
                'titulo' => "Can 'Em All",
                'descripcion' => 'Gestiona y colecciona criaturas de colores en una propuesta desenfadada que combina simulación, acción y estrategia.',
            ],
        ];

        $desarrolladoras = Desarrolladora::factory(5)->create();

        foreach ($catalogo as $indice => $datos) {
            $desarrolladora = $desarrolladoras[$indice === 5 ? 0 : $indice];
            $videojuego = Videojuego::factory()->for($desarrolladora)->create($datos);
            FichaTecnica::factory()->for($videojuego)->create();
            $videojuego->generos()->attach(collect($generoIds)->random(random_int(1, 3))->all());
        }
    }
}
