
@extends('layouts.app')

@section('content')
<div class="card md:p-8">
  <h2 class="text-3xl font-semibold mb-4">O našom servise</h2>
  <p class="text-lg md:text-xl text-gray-700">AutoServis je profesionálny servis vozidiel, ktorý poskytuje široké spektrum služieb pre osobné a úžitkové autá. Špecializujeme sa na diagnostiku, opravy, pravidelnú údržbu a pneuservis. Našou prioritou je rýchlosť, spoľahlivosť a spokojnosť zákazníkov. S dlhoročnými skúsenosťami a modernou technológiou zabezpečujeme, že vaše vozidlo bude v tých najlepších rukách. Neváhajte nás kontaktovať a dohodnúť si termín návštevy!</p>
  <a href="{{ url('/services') }}" class="cta-button bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300">Zistiť viac o službách</a>
</div>

<div class="news-section">
    @if ($news->isEmpty())
        <p class="text-gray-700">Zatiaľ nie sú žiadne novinky.</p>
    @else
        @foreach ($news as $item)
            <div class="news-item mb-4 p-4 bg-white shadow rounded">
                <h3 class="text-xl font-bold text-indigo-600">{{ $item->title }}</h3>
                <p class="text-gray-800">{{ $item->content }}</p>
                <p class="text-sm text-gray-500">Pridané: {{ $item->created_at->format('d.m.Y H:i') }}</p>
                @auth
                    @if (auth()->user()->role === 'admin')
                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button text-red-500 hover:text-red-700">
                                Zmazať
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
        @endforeach
    @endif
</div>

@endsection
