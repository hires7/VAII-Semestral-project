@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">
    <h2 class="text-2xl font-bold mb-6">Pridať novú službu</h2>
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold">Názov služby</label>
            <input type="text" id="name" name="name" placeholder="Napr. Výmena oleja" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold">Popis služby</label>
            <textarea id="description" name="description" rows="4" class="w-full p-2 border rounded" required></textarea>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-semibold">Cena (€)</label>
            <input type="number" id="price" name="price" class="w-full p-2 border rounded" required step="0.01">
        </div>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Pridať službu</button>
    </form>
</div>
@endsection
