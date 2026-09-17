<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                {{ $marca->nome }}
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Carros desta marca
            </p>

        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-6xl mx-auto px-4">

            <div class="bg-white dark:bg-gray-800 rounded-2xl border shadow-sm overflow-hidden">

                <div class="p-7 border-b flex justify-between items-center">

                    <div>

                        <p class="text-xs uppercase text-gray-400">
                            Marca
                        </p>

                        <h1 class="text-3xl font-bold">
                            {{ $marca->nome }}
                        </h1>

                    </div>


                    @if(in_array(auth()->user()->role, ['admin', 'gerente']))

                        <a href="{{ route('marcas.edit', $marca) }}"
                           class="px-4 py-2 rounded-lg bg-amber-500 text-white">

                            Editar marca

                        </a>

                    @endif

                </div>


                @if($marca->carros->isEmpty())

                    <div class="p-8 text-gray-500">
                        Nenhum carro cadastrado para esta marca.
                    </div>

                @else

                    <div class="overflow-x-auto">

                        <table class="w-full text-left">

                            <thead class="bg-gray-50">

                                <tr>

                                    <th class="px-6 py-3">
                                        Modelo
                                    </th>

                                    <th class="px-6 py-3">
                                        Ano
                                    </th>

                                    <th class="px-6 py-3">
                                        Preço
                                    </th>

                                    <th class="px-6 py-3">
                                        Cor
                                    </th>

                                    <th class="px-6 py-3 text-right">
                                        Ações
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y">

                                @foreach($marca->carros as $carro)

                                    <tr>

                                        <td class="px-6 py-4 font-medium">
                                            {{ $carro->modelo }}
                                        </td>

                                        <td class="px-6 py-4">
                                            {{ $carro->ano }}
                                        </td>

                                        <td class="px-6 py-4">
                                            R$ {{ number_format($carro->preco, 2, ',', '.') }}
                                        </td>

                                        <td class="px-6 py-4">
                                            {{ $carro->cor }}
                                        </td>

                                        <td class="px-6 py-4 text-right">

                                            <a href="{{ route('carros.show', $carro) }}"
                                               class="text-blue-600 hover:underline">

                                                Ver carro

                                            </a>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @endif


                <div class="p-5 bg-gray-50">

                    <a href="{{ route('marcas.index') }}"
                       class="text-blue-600 hover:underline">

                        ← Voltar para marcas

                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>