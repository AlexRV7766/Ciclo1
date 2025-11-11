@extends('layouts.base')

@section('title', 'Crear Horario')

@section('content')
<div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md mx-auto">
    <h2 class="text-2xl font-bold text-blue-700 mb-4">➕ Crear Horario</h2>

    <form action="{{ route('admin.horario.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="hora_inicio" class="block font-semibold text-gray-700">⏰ Hora Inicio</label>
            <input type="time" name="hora_inicio" id="hora_inicio" value="{{ old('hora_inicio') }}"
                   class="w-full border rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label for="hora_fin" class="block font-semibold text-gray-700">⏰ Hora Fin</label>
            <input type="time" name="hora_fin" id="hora_fin" value="{{ old('hora_fin') }}"
                   class="w-full border rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-gray-700">📅 Días</label>
            <select name="dias[]" multiple class="w-full border rounded-lg p-2" required>
                @foreach($dias as $dia)
                    <option value="{{ $dia->id }}">{{ $dia->nombre }}</option>
                @endforeach
            </select>
            <small class="text-gray-500">Mantén presionada la tecla Ctrl (o Cmd en Mac) para seleccionar varios días.</small>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                💾 Guardar Horario
            </button>
        </div>
    </form>
</div>
@endsection
