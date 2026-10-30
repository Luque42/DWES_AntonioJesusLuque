<?php

use Illuminate\Support\Facades\Route;

Route::get('/posts', function () {
    $posts = [
        (object) [
            'id' => 1,
            'titulo' => 'Mi primer artículo',
            'resumen' => 'Una introducción a las vistas Blade.',
        ],
        (object) [
            'id' => 2,
            'titulo' => 'Diseño reutilizable',
            'resumen' => 'Cómo organizar las páginas de una aplicación.',
        ],
        (object) [
            'id' => 3,
            'titulo' => 'Componentes de interfaz',
            'resumen' => 'Fragmentos que podemos reutilizar.',
        ],
    ];

    return view('posts.index', compact('posts'));
})->name('posts.index');

Route::get('/posts/{id}', function (int $id) {
    $post = (object) [
        'id' => $id,
        'titulo' => 'Mi primer artículo',
        'contenido' => 'Este es el contenido completo del artículo.',
        'comentarios' => [
            (object) [
                'autor' => 'Lucía',
                'contenido' => 'Me ha resultado muy útil.',
            ],
            (object) [
                'autor' => 'Mario',
                'contenido' => 'La explicación es clara.',
            ],
        ],
    ];

    return view('posts.show', compact('post'));
})->name('posts.show');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');