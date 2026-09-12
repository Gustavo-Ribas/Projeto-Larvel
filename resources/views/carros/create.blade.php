@extends('layouts.app')

@section('content')
<div class="py-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-6">Novo Carro</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('carros.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Marca</label>
            <select name="marca_id" class="w-full border rounded p-2">
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Modelo</label>
            <input type="text" name="modelo" value="{{ old('modelo') }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block mb-1">Ano</label>
            <input type="number" name="ano" value="{{ old('ano') }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block mb-1">Preço</label>
            <input type="number" step="0.01" name="preco" value="{{ old('preco') }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block mb-1">Cor</label>
            <input type="text" name="cor" value="{{ old('cor') }}" class="w-full border rounded p-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Salvar</button>
    </form>
</div>
@endsection
