<x-app-layout>

    <x-slot name="header">

        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                Detalhes do carro
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Informações do veículo
            </p>
        </div>

    </x-slot>


    <div class="py-10">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">

                <div class="p-8 border-b">

                    <p class="text-sm text-blue-600 font-medium">
                        {{ $carro->marca->nome }}
                    </p>

                    <h1 class="text-3xl font-bold mt-1">
                        {{ $carro->modelo }}
                    </h1>

                </div>


                <div class="p-8 grid sm:grid-cols-2 gap-6">

                    <div>
                        <p class="text-sm text-gray-500">Marca</p>
                        <p class="font-semibold mt-1">
                            {{ $carro->marca->nome }}
                        </p>
                    </div>


                    <div>
                        <p class="text-sm text-gray-500">Modelo</p>
                        <p class="font-semibold mt-1">
                            {{ $carro->modelo }}
                        </p>
                    </div>


                    <div>
                        <p class="text-sm text-gray-500">Ano</p>
                        <p class="font-semibold mt-1">
                            {{ $carro->ano }}
                        </p>
                    </div>


                    <div>
                        <p class="text-sm text-gray-500">Cor</p>
                        <p class="font-semibold mt-1">
                            {{ $carro->cor }}
                        </p>
                    </div>


                    <div class="sm:col-span-2">

                        <p class="text-sm text-gray-500">
                            Preço
                        </p>

                        <p class="text-2xl font-bold text-green-600 mt-1">
                            R$ {{ number_format($carro->preco, 2, ',', '.') }}
                        </p>

                    </div>

                </div>


                <div class="px-8 py-5 bg-gray-50 flex gap-3">

                    <a href="{{ route('carros.index') }}"
                       class="px-4 py-2 rounded-lg border border-gray-300">
                        Voltar
                    </a>


                    @can('update', $carro)

                        <a href="{{ route('carros.edit', $carro) }}"
                           class="px-4 py-2 rounded-lg bg-amber-500 text-white">
                            Editar carro
                        </a>

                    @endcan

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
