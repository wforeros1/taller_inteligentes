<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Agregar Nuevo Medicamento</h1>
        <form action="{{ route('medicamentos.store') }}" method="POST" class="card">
            @csrf
            @include('medicamentos.partials.form')
        </form>
    </div>
</x-app-layout>