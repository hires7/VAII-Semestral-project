@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 md:p-8">
    <h1 class="text-3xl font-bold mb-4">Moje autá</h1>

    @if ($cars->isEmpty())
        <p class="text-gray-700">Zatiaľ nemáte žiadne registrované autá.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($cars as $car)
                <div class="card p-4 bg-white shadow-md rounded-lg">
                    @if ($car->photo_path)
                        <img src="{{ asset('storage/' . $car->photo_path) }}" alt="Fotka auta" class="w-full h-40 object-cover rounded-lg mb-4">
                    @endif
                    <h3 class="text-xl font-bold text-indigo-600">{{ $car->brand }} {{ $car->model }}</h3>
                    <p class="text-gray-800">ŠPZ: {{ $car->license_plate }}</p>
                    <p class="text-gray-600 font-semibold">Rok výroby: {{ $car->year }}</p>

                    <div class="mt-4">
                        <a href="{{ route('cars.edit', $car->id) }}" class="edit-button">Upraviť</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="inline-block ml-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Zmazať</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
