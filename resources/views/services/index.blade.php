@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 md:p-8">
    @foreach ($services as $service)
        <div class="card mt-4">
            <h3 class="text-2xl md:text-3xl font-bold mb-2">{{ $service->name }}</h3>
            <p class="text-lg md:text-xl text-gray-700">{{ $service->description }}</p>
            <p class="text-lg font-bold text-indigo-600 mt-2">Cena: {{ number_format($service->price, 2) }} €</p>
            
            @auth
                @if (auth()->user()->role === 'admin')
                    <div class="mt-4">
                        <a href="{{ route('services.edit', $service->id) }}" class="text-indigo-600 hover:text-indigo-800">Upraviť</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="inline-block ml-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Zmazať</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    @endforeach
</div>
@endsection
