<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel Principal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="status-message mb-4">{{ session('status') }}</div>
            @endif

            <div class="card mb-8">
                <h3 class="text-2xl font-bold mb-4">💊 Medicamentos Pendientes de Hoy</h3>
                @forelse ($medicamentosPendientes as $medicamento)
                    <div class="pending-item {{ $medicamento->es_critico ? 'critical' : '' }}">
                        <div class="item-info">
                            <span class="item-time">{{ \Carbon\Carbon::parse($medicamento->hora)->format('h:i A') }}</span>
                            <span class="item-name">{{ $medicamento->nombre }}</span>
                            <span class="item-dose">{{ $medicamento->dosis }}</span>
                        </div>
                        <div class="item-action">
                            <form action="{{ route('medicamentos.tomado', $medicamento) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-exito">Marcar como Tomado</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600">¡Felicidades! No tienes medicamentos pendientes por hoy.</p>
                @endforelse
            </div>

            <div class="card">
                <h3 class="text-2xl font-bold mb-4">🗓️ Próximas Citas y Recordatorios</h3>
                @forelse ($citasProximas as $cita)
                    <div class="pending-item">
                        <div class="item-info">
                            <span class="item-time">{{ $cita->fecha_hora->format('d/m/Y h:i A') }}</span>
                            <span class="item-name">{{ $cita->tipo }}</span>
                            <p class="item-description">{{ $cita->descripcion }}</p>
                        </div>
                    </div>
                @empty
                     <p class="text-gray-600">No tienes citas programadas próximamente.</p>
                @endforelse
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Pedir permiso para notificaciones
            if ('Notification' in window && Notification.permission !== 'granted') {
                Notification.requestPermission();
            }

            function showNotification(title, options) {
                if (Notification.permission === 'granted') {
                    new Notification(title, options);
                    // Opcional: añadir un sonido
                    const audio = new Audio('{{ asset("sounds/notification.mp3") }}'); // Necesitarás un archivo de sonido
                    audio.play();
                }
            }

            // 2. Programar notificaciones para medicamentos
            @foreach ($medicamentosPendientes as $medicamento)
                (function() {
                    const horaMedicamento = "{{ $medicamento->hora }}";
                    const [horas, minutos] = horaMedicamento.split(':');
                    
                    const ahora = new Date();
                    const fechaRecordatorio = new Date();
                    fechaRecordatorio.setHours(horas, minutos, 0, 0);

                    // Si la hora ya pasó hoy, no hacer nada
                    if (fechaRecordatorio > ahora) {
                        const tiempoParaRecordatorio = fechaRecordatorio.getTime() - ahora.getTime();
                        
                        setTimeout(() => {
                            showNotification('¡Hora de tu medicamento!', {
                                body: 'No olvides tomar: {{ $medicamento->nombre }} ({{ $medicamento->dosis }})',
                                icon: '{{ asset("images/pill-icon.png") }}' // Necesitarás un ícono
                            });
                        }, tiempoParaRecordatorio);
                    }
                })();
            @endforeach

            // 3. Programar notificaciones para citas
            @foreach ($citasProximas as $cita)
                 (function() {
                    const fechaCita = new Date("{{ $cita->fecha_hora->toIso8601String() }}");
                    const minutosAntes = {{ $cita->minutos_antes_aviso }};
                    const fechaRecordatorio = new Date(fechaCita.getTime() - minutosAntes * 60000);
                    const ahora = new Date();

                    if (fechaRecordatorio > ahora) {
                        const tiempoParaRecordatorio = fechaRecordatorio.getTime() - ahora.getTime();

                        setTimeout(() => {
                             showNotification('Recordatorio de Cita Próxima', {
                                body: 'Tu cita ({{ $cita->tipo }}) es en ' + minutosAntes + ' minutos.',
                                icon: '{{ asset("images/calendar-icon.png") }}' // Necesitarás un ícono
                            });
                        }, tiempoParaRecordatorio);
                    }
                })();
            @endforeach
        });
    </script>
    @endpush
</x-app-layout>