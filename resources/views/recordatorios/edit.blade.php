<x-app-layout>
    <div class="container mx-auto p-4 sm:p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar Recordatorio</h1>
        
        <form action="{{ route('recordatorios.update', $recordatorio) }}" method="POST" class="card-form">
            @csrf
            @method('PUT')
            @include('recordatorios.partials.form', ['recordatorio' => $recordatorio])
        </form>
    </div>
</x-app-layout>