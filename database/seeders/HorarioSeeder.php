<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Horario;

class HorarioSeeder extends Seeder
{
    public function run(): void
    {
        // Crear un horario
        $horario = Horario::create([
            'hora_inicio' => '07:00:00',
            'hora_fin'    => '08:30:00',
        ]);

        $this->command->info("Horario creado correctamente: ID {$horario->id}");
    }
}




