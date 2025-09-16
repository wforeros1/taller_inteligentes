<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Mis Medicamentos</h1>
        <a href="{{ route('medicamentos.create') }}" class="btn btn-primary mb-4">Agregar Medicamento</a>

        @if (session('status'))
            <div class="status-message">{{ session('status') }}</div>
        @endif

        <table class="data-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dosis</th>
                    <th>Hora</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($medicamentos as $medicamento)
                    <tr>
                        <td>{{ $medicamento->nombre }}</td>
                        <td>{{ $medicamento->dosis }}</td>
                        <td>{{ \Carbon\Carbon::parse($medicamento->hora)->format('h:i A') }}</td>
                        <td>
                            <a href="{{ route('medicamentos.edit', $medicamento) }}" class="btn btn-edit">Editar</a>
                            <form action="{{ route('medicamentos.destroy', $medicamento) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Aún no has agregado medicamentos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>