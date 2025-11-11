<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Horario;
use App\Models\Dia;

class DiaHorarioSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ Obtener el horario que queremos asociar (por ejemplo, el primero)
        $horario = Horario::first();
        if (!$horario) {
            $this->command->error('No se encontró ningún horario. Ejecuta primero HorarioSeeder.');
            return;
        }

        // 2️⃣ Obtener los días lunes, miércoles y viernes
        $dias = Dia::whereIn('nombre', ['Lunes', 'Miércoles', 'Viernes'])->get();
        if ($dias->isEmpty()) {
            $this->command->error('No se encontraron días. Ejecuta primero DiasSeeder.');
            return;
        }

        // 3️⃣ Asociar los días al horario
        $horario->dias()->attach($dias->pluck('id')->toArray());

        $this->command->info('Relación horario-días creada correctamente.');
    }
}

