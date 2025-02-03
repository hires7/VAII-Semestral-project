@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 md:p-8">
    <h1 class="text-3xl font-bold mb-4">Recenzie zákazníkov</h1>

    @if ($reviews->isEmpty())
        <p class="text-gray-700">Zatiaľ neexistujú žiadne recenzie.</p>
    @else
        @foreach ($reviews as $review)
            <div class="card mt-4">
                <h3 class="text-xl font-bold text-indigo-600">{{ $review->user->name }}</h3>
                <p class="text-gray-800">{{ $review->content }}</p>
                <p class="text-gray-600 font-semibold">Hodnotenie: {{ $review->rating }} / 5</p>
                
                @auth
                    @if (auth()->user()->role === 'admin')
                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Zmazať</button>
                        </form>
                    @endif
                @endauth
            </div>
        @endforeach
    @endif
</div>
@endsection
