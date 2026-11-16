<form action="{{ $action }}" method="POST">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" value="{{ old('nombre', $desarrolladora->nombre ?? '') }}" maxlength="150" required>
        @error('nombre') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="pais">País</label>
        <input id="pais" name="pais" value="{{ old('pais', $desarrolladora->pais ?? '') }}" maxlength="100" required>
        @error('pais') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="fundacion">Año de fundación</label>
        <input id="fundacion" name="fundacion" type="number" min="1800" max="2026" value="{{ old('fundacion', $desarrolladora->fundacion ?? '') }}">
        @error('fundacion') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="actions">
        <button class="button" type="submit">Guardar</button>
        <a class="button button-secondary" href="{{ route('desarrolladoras.index') }}">Cancelar</a>
    </div>
</form>
