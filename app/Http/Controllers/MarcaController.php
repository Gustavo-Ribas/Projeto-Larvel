<?php
namespace App\Http\Controllers;

use App\Models\Marca;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::withCount('carros')->orderBy('nome')->get();

        return view('marcas.index', compact('marcas'));
    }

    public function show(Marca $marca)
    {
        $marca->load('carros');

        return view('marcas.show', compact('marca'));
    }
}
