<x-app-layout>
    <div class="container mx-auto p-4 sm:p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Agregar Nuevo Recordatorio</h1>
        
        <form action="{{ route('recordatorios.store') }}" method="POST" class="card-form">
            @csrf
            @include('recordatorios.partials.form')
        </form>
    </div>
</x-app-layout>