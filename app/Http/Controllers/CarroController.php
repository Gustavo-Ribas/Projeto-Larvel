<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\Marca;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index()
    {
        $marcas = Marca::with('carros')->orderBy('nome')->get();

        return view('carros.index', compact('marcas'));
    }

    public function create()
    {
        $this->authorize('create', Carro::class);

        $marcas = Marca::orderBy('nome')->get();

        return view('carros.create', compact('marcas'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Carro::class);

        $validated = $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'modelo' => 'required|string|min:2',
            'ano' => 'required|integer|min:1950',
            'preco' => 'required|numeric|min:0',
            'cor' => 'required|string',
        ]);

        Carro::create($validated);

        return redirect()->route('carros.index')->with('success', 'Carro cadastrado com sucesso.');
    }

    public function show(Carro $carro)
    {
        return view('carros.show', compact('carro'));
    }

    public function edit(Carro $carro)
    {
        $this->authorize('update', $carro);

        $marcas = Marca::orderBy('nome')->get();

        return view('carros.edit', compact('carro', 'marcas'));
    }

    public function update(Request $request, Carro $carro)
    {
        $this->authorize('update', $carro);

        $validated = $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'modelo' => 'required|string|min:2',
            'ano' => 'required|integer|min:1950',
            'preco' => 'required|numeric|min:0',
            'cor' => 'required|string',
        ]);

        $carro->update($validated);

        return redirect()->route('carros.index')->with('success', 'Carro atualizado com sucesso.');
    }

    public function destroy(Carro $carro)
    {
        $this->authorize('delete', $carro);

        $carro->delete();

        return redirect()->route('carros.index')->with('success', 'Carro excluído com sucesso.');
    }
}
