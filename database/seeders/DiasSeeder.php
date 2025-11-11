<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dia;

class DiasSeeder extends Seeder
{
    public function run(): void
    {
        $nombresDias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

        foreach ($nombresDias as $nombre) {
            // Crear cada día usando Eloquent
            Dia::create(['nombre' => $nombre]);
        }

        $this->command->info('Todos los días se han creado correctamente.');
    }
}

