@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Revisa el formulario:</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@php
    $selectedFeatures = old('features', $car->exists ? $car->features->pluck('id')->all() : []);
@endphp

<div class="row g-3">
    <div class="col-md-6">
        <label for="brand_id" class="form-label">Marca</label>
        <select name="brand_id" id="brand_id" class="form-select @error('brand_id') is-invalid @enderror">
            <option value="">-- Selecciona --</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" @selected(old('brand_id', $car->brand_id) == $brand->id)>
                    {{ $brand->name }}
                </option>
            @endforeach
        </select>
        @error('brand_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="model" class="form-label">Modelo</label>
        <input type="text" name="model" id="model"
               class="form-control @error('model') is-invalid @enderror"
               value="{{ old('model', $car->model) }}">
        @error('model') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3">
        <label for="price" class="form-label">Precio (€)</label>
        <input type="number" step="0.01" name="price" id="price"
               class="form-control @error('price') is-invalid @enderror"
               value="{{ old('price', $car->price) }}">
        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3">
        <label for="year" class="form-label">Año</label>
        <input type="number" name="year" id="year"
               class="form-control @error('year') is-invalid @enderror"
               value="{{ old('year', $car->year) }}">
        @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3">
        <label for="mileage" class="form-label">Kilómetros</label>
        <input type="number" name="mileage" id="mileage"
               class="form-control @error('mileage') is-invalid @enderror"
               value="{{ old('mileage', $car->mileage ?? 0) }}">
        @error('mileage') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3">
        <label for="fuel" class="form-label">Combustible</label>
        <select name="fuel" id="fuel" class="form-select @error('fuel') is-invalid @enderror">
            <option value="">-- Selecciona --</option>
            @foreach (\App\Models\Car::FUELS as $fuel)
                <option value="{{ $fuel }}" @selected(old('fuel', $car->fuel) === $fuel)>
                    {{ ucfirst($fuel) }}
                </option>
            @endforeach
        </select>
        @error('fuel') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label for="status" class="form-label">Estado</label>
        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
            @foreach (\App\Models\Car::STATUSES as $status)
                <option value="{{ $status }}"
                    @selected(old('status', $car->status ?? 'disponible') === $status)>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label for="description" class="form-label">Descripción</label>
        <textarea name="description" id="description" rows="3"
                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $car->description) }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label d-block">Extras</label>
        <div class="row">
            @foreach ($features as $feature)
                <div class="col-md-3 col-sm-4 col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="features[]"
                               id="feature_{{ $feature->id }}" value="{{ $feature->id }}"
                               @checked(in_array($feature->id, $selectedFeatures))>
                        <label class="form-check-label" for="feature_{{ $feature->id }}">
                            {{ $feature->name }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
        @error('features') <div class="text-danger small">{{ $message }}</div> @enderror
        @error('features.*') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mt-4 d-flex gap-2">
    <button type="submit" class="btn btn-primary">{{ $submitText ?? 'Guardar' }}</button>
    <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary">Cancelar</a>
</div>