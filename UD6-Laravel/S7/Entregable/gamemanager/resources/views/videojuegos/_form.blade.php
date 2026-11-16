<form action="{{ $action }}" method="POST">
    @csrf
    @isset($method)
        @method($method)
    @endisset

    <div class="form-group">
        <label for="titulo">Título</label>
        <input id="titulo" name="titulo" value="{{ old('titulo', $videojuego->titulo ?? '') }}" required maxlength="200">
        @error('titulo') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion', $videojuego->descripcion ?? '') }}</textarea>
        @error('descripcion') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="grid">
        <div class="form-group">
            <label for="anio">Año</label>
            <input id="anio" name="anio" type="number" value="{{ old('anio', $videojuego->anio ?? '') }}" required>
            @error('anio') <div class="error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input id="precio" name="precio" type="number" step="0.01" min="0" value="{{ old('precio', $videojuego->precio ?? '') }}" required>
            @error('precio') <div class="error">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="form-group">
        <input type="hidden" name="publicado" value="0">
        <label><input type="checkbox" name="publicado" value="1" @checked(old('publicado', $videojuego->publicado ?? true))> Publicado</label>
        @error('publicado') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="desarrolladora_id">Desarrolladora</label>
        <select id="desarrolladora_id" name="desarrolladora_id" required>
            <option value="">Selecciona una desarrolladora</option>
            @foreach ($desarrolladoras as $desarrolladora)
                <option value="{{ $desarrolladora->id }}" @selected(old('desarrolladora_id', $videojuego->desarrolladora_id ?? '') == $desarrolladora->id)>{{ $desarrolladora->nombre }}</option>
            @endforeach
        </select>
        @error('desarrolladora_id') <div class="error">{{ $message }}</div> @enderror
    </div>
    @php($generosSeleccionados = old('generos', isset($videojuego) ? $videojuego->generos->modelKeys() : []))
    <div class="form-group checkbox-list">
        <label>Géneros</label>
        @foreach ($generos as $genero)
            <label><input type="checkbox" name="generos[]" value="{{ $genero->id }}" @checked(in_array($genero->id, $generosSeleccionados))> {{ $genero->nombre }}</label>
        @endforeach
        @error('generos') <div class="error">{{ $message }}</div> @enderror
        @error('generos.*') <div class="error">{{ $message }}</div> @enderror
    </div>
    <h2>Ficha técnica</h2>
    <div class="grid">
        <div class="form-group">
            <label for="plataforma">Plataforma</label>
            <select id="plataforma" name="plataforma" required>
                @foreach (['PC', 'PlayStation 5', 'Xbox Series', 'Nintendo Switch', 'Multiplataforma'] as $plataforma)
                    <option value="{{ $plataforma }}" @selected(old('plataforma', $videojuego->fichaTecnica->plataforma ?? '') === $plataforma)>{{ $plataforma }}</option>
                @endforeach
            </select>
            @error('plataforma') <div class="error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="motor_grafico">Motor gráfico</label>
            <select id="motor_grafico" name="motor_grafico" required>
                @foreach (['Unreal Engine 5', 'Unity', 'RE Engine', 'Frostbite', 'Motor propio'] as $motor)
                    <option value="{{ $motor }}" @selected(old('motor_grafico', $videojuego->fichaTecnica->motor_grafico ?? '') === $motor)>{{ $motor }}</option>
                @endforeach
            </select>
            @error('motor_grafico') <div class="error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="edad_recomendada">Edad recomendada</label>
            <select id="edad_recomendada" name="edad_recomendada" required>
                @foreach ([3, 7, 12, 16, 18] as $edad)
                    <option value="{{ $edad }}" @selected(old('edad_recomendada', $videojuego->fichaTecnica->edad_recomendada ?? '') == $edad)>{{ $edad }}+</option>
                @endforeach
            </select>
            @error('edad_recomendada') <div class="error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="espacio_gb">Espacio (GB)</label>
            <input id="espacio_gb" name="espacio_gb" type="number" min="1" value="{{ old('espacio_gb', $videojuego->fichaTecnica->espacio_gb ?? '') }}" required>
            @error('espacio_gb') <div class="error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="modo_juego">Modo de juego</label>
            <select id="modo_juego" name="modo_juego" required>
                @foreach (['Un jugador', 'Multijugador', 'Un jugador y multijugador'] as $modo)
                    <option value="{{ $modo }}" @selected(old('modo_juego', $videojuego->fichaTecnica->modo_juego ?? '') === $modo)>{{ $modo }}</option>
                @endforeach
            </select>
            @error('modo_juego') <div class="error">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="actions">
        <button class="button" type="submit">Guardar</button>
        <a class="button button-secondary" href="{{ route('videojuegos.index') }}">Cancelar</a>
    </div>
</form>
