<x-app-layout>
    <div class="container mx-auto p-4 sm:p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Mis Registros de Salud</h1>
            <a href="{{ route('salud.create') }}" class="btn btn-primary">Agregar Registro</a>
        </div>

        @if (session('status'))
            <div class="status-message mb-4">{{ session('status') }}</div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="data-table">
                <thead class="bg-gray-50">
                    <tr>
                        <th>Fecha</th>
                        <th>Peso (kg)</th>
                        <th>Presión Arterial</th>
                        <th>Ritmo Cardíaco</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($registros as $registro)
                        <tr>
                            <td>{{ $registro->created_at->format('d/m/Y h:i A') }}</td>
                            <td>{{ $registro->peso ?? 'N/A' }}</td>
                            <td>{{ $registro->presion_sistolica ?? 'N/A' }} / {{ $registro->presion_diastolica ?? 'N/A' }}</td>
                            <td>{{ $registro->ritmo_cardiaco ?? 'N/A' }} ppm</td>
                            <td class="actions">
                                <a href="{{ route('salud.edit', $registro) }}" class="btn btn-edit">Editar</a>
                                <form action="{{ route('salud.destroy', $registro) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6">Aún no has agregado registros de salud.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>