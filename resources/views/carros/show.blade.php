<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Carros
        </h2>
</x-slot>
<div class="py-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-6">{{ $carro->marca->nome }} {{ $carro->modelo }}</h1>

    <div class="space-y-2">
        <p><strong>Marca:</strong> {{ $carro->marca->nome }}</p>
        <p><strong>Modelo:</strong> {{ $carro->modelo }}</p>
        <p><strong>Ano:</strong> {{ $carro->ano }}</p>
        <p><strong>Preço:</strong> R$ {{ number_format($carro->preco, 2, ',', '.') }}</p>
        <p><strong>Cor:</strong> {{ $carro->cor }}</p>
    </div>

    <a href="{{ route('carros.index') }}" class="inline-block mt-6 text-blue-600">Voltar</a>
</div>
</x-app-layout>
