<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Novo carro
        </h2>
    </x-slot>


    <div class="py-10">

        <div class="max-w-2xl mx-auto px-4">

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border p-8">

                <h1 class="text-2xl font-bold">
                    Cadastrar carro
                </h1>

                <p class="text-sm text-gray-500 mt-1 mb-8">
                    Preencha os dados do novo veículo.
                </p>


                @if ($errors->any())

                    <div class="mb-6 rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3">

                        <ul class="list-disc list-inside">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form action="{{ route('carros.store') }}"
                      method="POST"
                      class="space-y-5">

                    @csrf


                    <div>

                        <label class="block text-sm font-medium mb-1">
                            Marca
                        </label>

                        <select name="marca_id"
                                class="w-full rounded-lg border-gray-300"
                                required>

                            <option value="">
                                Selecione uma marca
                            </option>

                            @foreach($marcas as $marca)

                                <option value="{{ $marca->id }}">
                                    {{ $marca->nome }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div>

                        <label class="block text-sm font-medium mb-1">
                            Modelo
                        </label>

                        <input type="text"
                               name="modelo"
                               value="{{ old('modelo') }}"
                               class="w-full rounded-lg border-gray-300"
                               required>

                    </div>


                    <div class="grid sm:grid-cols-2 gap-5">

                        <div>

                            <label class="block text-sm font-medium mb-1">
                                Ano
                            </label>

                            <input type="number"
                                   name="ano"
                                   value="{{ old('ano') }}"
                                   class="w-full rounded-lg border-gray-300"
                                   required>

                        </div>


                        <div>

                            <label class="block text-sm font-medium mb-1">
                                Cor
                            </label>

                            <input type="text"
                                   name="cor"
                                   value="{{ old('cor') }}"
                                   class="w-full rounded-lg border-gray-300"
                                   required>

                        </div>

                    </div>


                    <div>

                        <label class="block text-sm font-medium mb-1">
                            Preço
                        </label>

                        <input type="number"
                               step="0.01"
                               name="preco"
                               value="{{ old('preco') }}"
                               class="w-full rounded-lg border-gray-300"
                               required>

                    </div>


                    <div class="flex justify-end gap-3 pt-4">

                        <a href="{{ route('carros.index') }}"
                           class="px-4 py-2 rounded-lg border">
                            Cancelar
                        </a>

                        <button class="px-5 py-2 rounded-lg bg-blue-600 text-white">
                            Cadastrar carro
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
