@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 md:p-8">
    <h1 class="text-3xl font-bold mb-4">Pridať nové auto</h1>

    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="brand" class="block font-semibold">Značka:</label>
            <input type="text" id="brand" name="brand" class="form-input" placeholder="Zadajte značku auta" required>
        </div>

        <div>
            <label for="model" class="block font-semibold">Model:</label>
            <input type="text" id="model" name="model" class="form-input" placeholder="Zadajte model auta" required>
        </div>

        <div>
            <label for="license_plate" class="block font-semibold">ŠPZ:</label>
            <input type="text" id="license_plate" name="license_plate" class="form-input" placeholder="Zadajte ŠPZ auta" required>
        </div>

        <div>
            <label for="year" class="block font-semibold">Rok výroby:</label>
            <input type="number" id="year" name="year" class="form-input" placeholder="Zadajte rok výroby" min="1950" max="{{ date('Y') }}" required>
        </div>

        <div>
            <label for="photo" class="block font-semibold">Fotka auta:</label>
            <input type="file" name="photo" id="photo" class="form-input">
        </div>

        <button type="submit" class="form-button">Pridať auto</button>
    </form>
</div>
@endsection
