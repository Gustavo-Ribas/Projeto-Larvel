@extends('layouts.app')

@section('content')
<div class="py-6 max-w-5xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Carros por Marca</h1>

        @can('create', App\Models\Carro::class)
            <a href="{{ route('carros.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                Novo Carro
            </a>
        @endcan
    </div>

    @foreach($marcas as $marca)
        <div class="mb-8">
            <h2 class="text-lg font-semibold border-b pb-2 mb-3">{{ $marca->nome }}</h2>

            @if($marca->carros->isEmpty())
                <p class="text-gray-500">Nenhum carro cadastrado para essa marca.</p>
            @else
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-sm text-gray-500">
                            <th class="py-2">Modelo</th>
                            <th class="py-2">Ano</th>
                            <th class="py-2">Preço</th>
                            <th class="py-2">Cor</th>
                            <th class="py-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($marca->carros as $carro)
                            <tr class="border-t">
                                <td class="py-2">{{ $carro->modelo }}</td>
                                <td class="py-2">{{ $carro->ano }}</td>
                                <td class="py-2">R$ {{ number_format($carro->preco, 2, ',', '.') }}</td>
                                <td class="py-2">{{ $carro->cor }}</td>
                                <td class="py-2 space-x-2">
                                    <a href="{{ route('carros.show', $carro) }}" class="text-blue-600">Ver</a>

                                    @can('update', $carro)
                                        <a href="{{ route('carros.edit', $carro) }}" class="text-yellow-600">Editar</a>
                                    @endcan

                                    @can('delete', $carro)
                                        <form action="{{ route('carros.destroy', $carro) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600">Excluir</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endforeach
</div>
@endsection
