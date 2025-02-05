@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center">
    <h1 class="text-3xl font-bold mb-4 text-center">Zoznam služieb</h1>
</div>
@auth
    @if (auth()->user()->role === 'admin')
    <a href="{{ route('services.editservices') }}" class="cta-button bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300">
        Upraviť služby
    </a>    
    @endif
@endauth


<div class="container mx-auto p-4">
    <input
        type="text"
        id="search-input"
        class="w-full p-2 border rounded"
        placeholder="Vyhľadajte službu podľa názvu alebo popisu"
    >
    <div id="search-results" class="mt-4"></div>
</div>

<div id="services-container" class="container mx-auto p-4 md:p-8"></div>

@auth
    @if (auth()->user()->role === 'admin')
    <a href="{{ route('services.create') }}" class="cta-button bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300">
        Pridať službu
    </a>    
    @endif
@endauth

@endsection
