@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 md:p-8">
    <h1 class="text-3xl font-bold mb-4">Novinky</h1>

    @if ($news->isEmpty())
        <p class="text-gray-700">Zatiaľ neexistujú žiadne novinky.</p>
    @else
        <div class="space-y-4">
            @foreach ($news as $item)
                <div class="card p-4 bg-white shadow-md rounded-lg">
                    <h3 class="text-xl font-bold text-indigo-600">{{ $item->title }}</h3>
                    <p class="text-gray-800">{{ $item->content }}</p>
                    <p class="text-gray-600 text-sm">Publikované: {{ $item->created_at->format('d.m.Y H:i') }}</p>
                    
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button text-red-500 hover:text-red-700">Zmazať</button>
                            </form>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    @endif

    @auth
        @if (auth()->user()->role === 'admin')
            <a href="{{ route('news.create') }}" class="cta-button bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300 mt-4 inline-block">Pridať novinku</a>
        @endif
    @endauth
</div>
@endsection
