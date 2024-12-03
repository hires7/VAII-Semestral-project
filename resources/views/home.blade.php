
@extends('layouts.app')

@section('content')
<div class="card md:p-8">
  <h2 class="text-3xl font-semibold mb-4">O našom servise</h2>
  <p class="text-lg md:text-xl text-gray-700">Tu môžete popísať váš servis a jeho služby.</p>
  <a href="{{ url('/services') }}" class="cta-button bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300">Zistiť viac o službách</a>
</div>
@endsection
