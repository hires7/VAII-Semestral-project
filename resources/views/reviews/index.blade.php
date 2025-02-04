@extends('layouts.app')

@section('content')

<div class="container mx-auto p-4 md:p-8">
    <div class="flex justify-center items-center">
        <h1 class="text-3xl font-bold mb-4 text-center">Recenzie zákazníkov</h1>
    </div>

    @if ($reviews->isEmpty())
        <p class="text-gray-700">Zatiaľ neexistujú žiadne recenzie.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($reviews as $review)
                <div class="card p-4 bg-white shadow-md rounded-lg">
                    <h3 class="text-xl font-bold text-indigo-600">{{ $review->user->name }}</h3>
                    <p class="text-gray-800">{{ $review->content }}</p>
                    <p class="text-gray-600 font-semibold">Hodnotenie: {{ $review->rating }} / 5</p>
                    <p class="text-sm text-gray-500">{{ $review->created_at->format('d.m.Y') }}</p>
                    
                    @auth
                        @if (auth()->user()->role === 'admin' || auth()->id() === $review->user_id)
                            <div class="flex space-x-2 mt-2">
                                <a href="{{ route('reviews.edit', $review->id) }}" 
                                   class="edit-button">
                                   Upraviť
                                </a>
                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">Zmazať</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    @endif
</div>




<div class="form-container">
    <h2 class="text-3xl font-semibold mb-4">Pridajte hodnotenie</h2>
    @auth
        <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="rating" class="block font-semibold">Hodnotenie (1-5):</label>
                <select name="rating" id="rating" class="form-input">
                    <option value="1">1 - Veľmi zlé</option>
                    <option value="2">2 - Zlé</option>
                    <option value="3">3 - Priemerné</option>
                    <option value="4">4 - Dobré</option>
                    <option value="5">5 - Výborné</option>
                </select>
            </div>

            <div>
                <label for="content" class="block font-semibold">Vaša recenzia:</label>
                <textarea name="content" id="content" rows="5" class="form-textarea" placeholder="Napíšte svoju recenziu"></textarea>
            </div>

            <button type="submit" class="form-button">Odoslať hodnotenie</button>
        </form>
    @else
        <p class="text-gray-700">Na pridanie hodnotenia sa musíte prihlásiť.</p>
    @endauth
</div>

@endsection
