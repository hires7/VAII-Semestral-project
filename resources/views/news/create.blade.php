@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 md:p-8">
    <h1 class="text-3xl font-bold mb-4">Pridať novinku</h1>

    <form action="{{ route('news.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="title" class="block font-semibold">Názov novinky:</label>
            <input type="text" id="title" name="title" class="form-input w-full" placeholder="Zadajte názov" required>
        </div>

        <div>
            <label for="content" class="block font-semibold">Obsah:</label>
            <textarea id="content" name="content" rows="5" class="form-textarea w-full" placeholder="Napíšte obsah novinky" required></textarea>
        </div>

        <button type="submit" class="form-button">Pridať novinku</button>
    </form>
</div>
@endsection
