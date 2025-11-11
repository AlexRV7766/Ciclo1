@extends('layouts.base')

@section('title', 'Editar Horario')

@section('content')
@php
    // Inicializar variables por seguridad
    $dias = $dias ?? collect();
    $diasSeleccionados = $diasSeleccionados ?? [];
@endphp

<div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md mx-auto">
    <h2 class="text-2xl font-bold text-blue-700 mb-4">✏️ Editar Horario</h2>

    <form action="{{ url('admin/horario/'.$horario->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="hora_inicio" class="block font-semibold text-gray-700">⏰ Hora Inicio</label>
            <input type="time" name="hora_inicio" id="hora_inicio"
                   value="{{ old('hora_inicio', $horario->hora_inicio) }}"
                   class="w-full border rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label for="hora_fin" class="block font-semibold text-gray-700">⏰ Hora Fin</label>
            <input type="time" name="hora_fin" id="hora_fin"
                   value="{{ old('hora_fin', $horario->hora_fin) }}"
                   class="w-full border rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-700">📅 Días</label>
            <select name="dias[]" multiple class="w-full border rounded-lg p-2" required>
                @forelse($dias as $dia)
                    <option value="{{ $dia->id }}" {{ in_array($dia->id, $diasSeleccionados) ? 'selected' : '' }}>
                        {{ $dia->nombre }}
                    </option>
                @empty
                    <option disabled>No hay días disponibles</option>
                @endforelse
            </select>
            <small class="text-gray-500">Mantén presionada la tecla Ctrl (o Cmd en Mac) para seleccionar varios días.</small>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                💾 Actualizar Horario
            </button>
        </div>
    </form>

    <div class="mt-4 text-center">
        <a href="{{ route('admin.horario.index') }}" class="text-blue-600 hover:underline">
            ← Volver a la lista
        </a>
    </div>
</div>
@endsection

