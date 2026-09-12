<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    public function run(): void
    {
        $marcas = ['Toyota', 'Volkswagen', 'Chevrolet', 'Fiat', 'Honda'];

        foreach ($marcas as $nome) {
            Marca::create(['nome' => $nome]);
        }
    }
}
