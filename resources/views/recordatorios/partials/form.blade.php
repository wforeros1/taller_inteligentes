<div class="space-y-6">
    <div>
        <label for="tipo" class="form-label">Tipo de Recordatorio (ej: Cita Médica):</label>
        <input type="text" id="tipo" name="tipo" value="{{ old('tipo', $recordatorio->tipo ?? '') }}" class="form-input" required>
        {{-- Muestra el error si 'tipo' no es válido --}}
        @error('tipo')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" class="form-input" required>{{ old('descripcion', $recordatorio->descripcion ?? '') }}</textarea>
        {{-- Muestra el error si 'descripcion' no es válida --}}
        @error('descripcion')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="fecha_hora" class="form-label">Fecha y Hora:</label>
        <input type="datetime-local" id="fecha_hora" name="fecha_hora" value="{{ old('fecha_hora', isset($recordatorio->fecha_hora) ? $recordatorio->fecha_hora->format('Y-m-d\TH:i') : '') }}" class="form-input" required>
        {{-- Muestra el error si 'fecha_hora' no es válida --}}
        @error('fecha_hora')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="mt-8 flex justify-end">
    <a href="{{ route('recordatorios.index') }}" class="btn btn-secondary mr-4">Cancelar</a>
    <button type="submit" class="form-button">Guardar Recordatorio</button>
</div>