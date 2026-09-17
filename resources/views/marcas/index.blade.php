<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Marcas
        </h2>
    </x-slot>

<div class="py-6 max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Marcas</h1>

    @if($marcas->isEmpty())
        <p class="text-gray-500">Nenhuma marca cadastrada.</p>
    @else
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-sm text-gray-500">
                    <th class="py-2">Marca</th>
                    <th class="py-2">Carros cadastrados</th>
                    <th class="py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marcas as $marca)
                    <tr class="border-t">
                        <td class="py-2">{{ $marca->nome }}</td>
                        <td class="py-2">{{ $marca->carros_count }}</td>
                        <td class="py-2">
                            <a href="{{ route('marcas.show', $marca) }}" class="text-blue-600">
                                Ver carros desta marca
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('carros.index') }}" class="inline-block mt-6 text-blue-600">
        Voltar para todos os carros
    </a>
</div>
</x-app-layout>