<div>
    <label for="nombre">Nombre del Medicamento:</label>
    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $medicamento->nombre ?? '') }}" required>
</div>
<div>
    <label for="dosis">Dosis:</label>
    <input type="text" id="dosis" name="dosis" value="{{ old('dosis', $medicamento->dosis ?? '') }}">
</div>
<div>
    <label for="hora">Hora:</label>
    <input type="time" id="hora" name="hora" value="{{ old('hora', $medicamento->hora ?? '') }}" required>
</div>
<button type="submit" class="form-button">Guardar</button>