@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 md:p-8">
    <h1 class="text-3xl font-bold mb-4">Upraviť auto</h1>

    <form action="{{ route('cars.update', $car->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="brand" class="block font-semibold">Značka:</label>
            <input type="text" id="brand" name="brand" class="form-input" value="{{ $car->brand }}" required>
        </div>

        <div>
            <label for="model" class="block font-semibold">Model:</label>
            <input type="text" id="model" name="model" class="form-input" value="{{ $car->model }}" required>
        </div>

        <div>
            <label for="license_plate" class="block font-semibold">ŠPZ:</label>
            <input type="text" id="license_plate" name="license_plate" class="form-input" value="{{ $car->license_plate }}" required>
        </div>

        <div>
            <label for="year" class="block font-semibold">Rok výroby:</label>
            <input type="number" id="year" name="year" class="form-input" value="{{ $car->year }}" min="1900" max="{{ date('Y') }}" required>
        </div>

        <button type="submit" class="form-button">Uložiť zmeny</button>
    </form>
</div>
@endsection
