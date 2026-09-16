<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarroRequest;
use App\Http\Requests\UpdateCarroRequest;

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

        public function store(StoreCarroRequest $request)
    {
        Carro::create($request->validated());

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

    public function update(UpdateCarroRequest $request, Carro $carro)
    {
        $carro->update($request->validated());

        return redirect()->route('carros.index')->with('success', 'Carro atualizado com sucesso.');
    }

    public function destroy(Carro $carro)
    {
        $this->authorize('delete', $carro);

        $carro->delete();

        return redirect()->route('carros.index')->with('success', 'Carro excluído com sucesso.');
    }
}
