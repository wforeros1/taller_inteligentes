<x-app-layout>
    <div class="container mx-auto p-4 sm:p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Mis Recordatorios</h1>
            <a href="{{ route('recordatorios.create') }}" class="btn btn-primary">Agregar Recordatorio</a>
        </div>

        @if (session('status'))
            <div class="status-message mb-4">{{ session('status') }}</div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="data-table">
                <thead class="bg-gray-50">
                    <tr>
                        <th>Fecha y Hora</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($recordatorios as $recordatorio)
                        <tr>
                            <td>{{ $recordatorio->fecha_hora->format('d/m/Y h:i A') }}</td>
                            <td>{{ $recordatorio->tipo }}</td>
                            <td>{{ Str::limit($recordatorio->descripcion, 50) }}</td>
                            <td class="actions">
                                <a href="{{ route('recordatorios.edit', $recordatorio) }}" class="btn btn-edit">Editar</a>
                                <form action="{{ route('recordatorios.destroy', $recordatorio) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('¿Estás seguro de que quieres eliminar este recordatorio?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-6">Aún no has agregado recordatorios.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>