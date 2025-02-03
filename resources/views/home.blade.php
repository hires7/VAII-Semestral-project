
@extends('layouts.app')

@section('content')
<div class="card md:p-8">
  <h2 class="text-3xl font-semibold mb-4">O našom servise</h2>
  <p class="text-lg md:text-xl text-gray-700">AutoServis je profesionálny servis vozidiel, ktorý poskytuje široké spektrum služieb pre osobné a úžitkové autá. Špecializujeme sa na diagnostiku, opravy, pravidelnú údržbu a pneuservis. Našou prioritou je rýchlosť, spoľahlivosť a spokojnosť zákazníkov. S dlhoročnými skúsenosťami a modernou technológiou zabezpečujeme, že vaše vozidlo bude v tých najlepších rukách. Neváhajte nás kontaktovať a dohodnúť si termín návštevy!</p>
  <a href="{{ url('/services') }}" class="cta-button bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300">Zistiť viac o službách</a>
</div>


<div class="card md:p-8">
  <h2 class="text-3xl font-semibold mb-4">Recenzie zákazníkov</h2>
</div>

<div class="card md:p-8">
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
