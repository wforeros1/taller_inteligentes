<x-app-layout>
    <div class="container mx-auto p-4 sm:p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar Registro de Salud</h1>
        
        <form action="{{ route('salud.update', $salud) }}" method="POST" class="card-form">
            @csrf
            @method('PUT')
            @include('salud.partials.form', ['salud' => $salud])
        </form>
    </div>
</x-app-layout>