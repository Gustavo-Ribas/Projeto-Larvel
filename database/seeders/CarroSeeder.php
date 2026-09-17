<?php

namespace Database\Seeders;

use App\Models\Carro;
use App\Models\Marca;
use Illuminate\Database\Seeder;

class CarroSeeder extends Seeder
{
    public function run(): void
    {
        $carros = [
            ['marca' => 'Toyota',     'modelo' => 'Corolla', 'ano' => 2022, 'preco' => 145000, 'cor' => 'Prata'],
            ['marca' => 'Toyota',     'modelo' => 'Hilux',   'ano' => 2023, 'preco' => 260000, 'cor' => 'Branco'],
            ['marca' => 'Volkswagen', 'modelo' => 'Gol',     'ano' => 2021, 'preco' => 68000,  'cor' => 'Vermelho'],
            ['marca' => 'Volkswagen', 'modelo' => 'Nivus',   'ano' => 2023, 'preco' => 118000, 'cor' => 'Cinza'],
            ['marca' => 'Chevrolet',  'modelo' => 'Onix',    'ano' => 2022, 'preco' => 82000,  'cor' => 'Preto'],
            ['marca' => 'Fiat',       'modelo' => 'Argo',    'ano' => 2021, 'preco' => 75000,  'cor' => 'Branco'],
            ['marca' => 'Honda',      'modelo' => 'Civic',   'ano' => 2023, 'preco' => 155000, 'cor' => 'Azul'],
        ];

        foreach ($carros as $dados) {
            $marca = Marca::where('nome', $dados['marca'])->first();

            if ($marca) {
                Carro::create([
                    'marca_id' => $marca->id,
                    'modelo'   => $dados['modelo'],
                    'ano'      => $dados['ano'],
                    'preco'    => $dados['preco'],
                    'cor'      => $dados['cor'],
                ]);
            }
        }
    }
}