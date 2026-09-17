<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Carros da marca: {{ $marca->nome }}
        </h2>
    </x-slot>

<div class="py-6 max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Carros da marca: {{ $marca->nome }}</h1>

    @if($marca->carros->isEmpty())
        <p class="text-gray-500">Nenhum carro cadastrado para essa marca ainda.</p>
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

    <a href="{{ route('marcas.index') }}" class="inline-block mt-6 text-blue-600">
        Voltar para lista de marcas
    </a>
</div>
</x-app-layout>