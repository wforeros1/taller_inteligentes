<div class="space-y-6">
    <div>
        <label for="peso" class="form-label">Peso (kg):</label>
        <input type="number" step="0.1" id="peso" name="peso" value="{{ old('peso', $salud->peso ?? '') }}" class="form-input">
    </div>
    <div>
        <label for="presion_sistolica" class="form-label">Presión Arterial (Sistólica, ej: 120):</label>
        <input type="number" id="presion_sistolica" name="presion_sistolica" value="{{ old('presion_sistolica', $salud->presion_sistolica ?? '') }}" class="form-input">
    </div>
    <div>
        <label for="presion_diastolica" class="form-label">Presión Arterial (Diastólica, ej: 80):</label>
        <input type="number" id="presion_diastolica" name="presion_diastolica" value="{{ old('presion_diastolica', $salud->presion_diastolica ?? '') }}" class="form-input">
    </div>
    <div>
        <label for="ritmo_cardiaco" class="form-label">Ritmo Cardíaco (pulsos por minuto):</label>
        <input type="number" id="ritmo_cardiaco" name="ritmo_cardiaco" value="{{ old('ritmo_cardiaco', $salud->ritmo_cardiaco ?? '') }}" class="form-input">
    </div>
</div>
<div class="mt-8 flex justify-end">
    <a href="{{ route('salud.index') }}" class="btn btn-secondary mr-4">Cancelar</a>
    <button type="submit" class="form-button">Guardar Registro</button>
</div>