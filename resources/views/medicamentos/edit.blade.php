<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Editar Medicamento</h1>
        <form action="{{ route('medicamentos.update', $medicamento) }}" method="POST" class="card">
            @csrf
            @method('PUT')
            @include('medicamentos.partials.form', ['medicamento' => $medicamento])
        </form>
    </div>
</x-app-layout>