<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Horario;
use App\Models\Dia;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::with('dias')->get();
        return view('admin.horario.index', compact('horarios'));
    }

    public function create()
    {
        $dias = Dia::all();
        return view('admin.horario.create', compact('dias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'dias' => 'required|array',
        ]);

        $horario = Horario::create([
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
        ]);

        $horario->dias()->attach($request->dias);

        return redirect()->route('admin.horario.index')
                         ->with('success', 'Horario registrado correctamente.');
    }

    public function edit(Horario $horario)
    {
        $dias = Dia::all();
        $diasSeleccionados = $horario->dias->pluck('id')->toArray();
        return view('admin.horario.edit', compact('horario', 'dias', 'diasSeleccionados'));
    }

    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'dias' => 'required|array',
        ]);

        // Actualizamos los atributos de Horario
        $horario->update([
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
        ]);

        // Sincronizamos los días con la tabla pivot
        $horario->dias()->sync($request->dias);

        // Tocamos el modelo para que Laravel lo considere modificado
        $horario->touch();

        return redirect()->route('admin.horario.index')
                        ->with('success', 'Horario actualizado correctamente.');
    }


    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('admin.horario.index')
                         ->with('success', 'Horario eliminado correctamente.');
    }
}
