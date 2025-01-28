@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 md:p-8">
    <h2 class="text-2xl font-bold mb-6">Upraviť službu</h2>

    <form method="POST" action="{{ route('services.update', $service->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-lg font-semibold">Názov služby</label>
            <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded" value="{{ old('name', $service->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-lg font-semibold">Popis</label>
            <textarea id="description" name="description" rows="4" class="w-full p-3 border border-gray-300 rounded" required>{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-lg font-semibold">Cena (€)</label>
            <input type="number" id="price" name="price" step="0.01" class="w-full p-3 border border-gray-300 rounded" value="{{ old('price', $service->price) }}" required>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                Uložiť zmeny
            </button>
        </div>
    </form>
</div>
@endsection
