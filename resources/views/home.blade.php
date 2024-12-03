
@extends('layouts.app')

@section('content')
<div class="card md:p-8">
  <h2 class="text-3xl font-semibold mb-4">O našom servise</h2>
  <p class="text-lg md:text-xl text-gray-700">AutoServis je profesionálny servis vozidiel, ktorý poskytuje široké spektrum služieb pre osobné a úžitkové autá. Špecializujeme sa na diagnostiku, opravy, pravidelnú údržbu a pneuservis. Našou prioritou je rýchlosť, spoľahlivosť a spokojnosť zákazníkov. S dlhoročnými skúsenosťami a modernou technológiou zabezpečujeme, že vaše vozidlo bude v tých najlepších rukách. Neváhajte nás kontaktovať a dohodnúť si termín návštevy!</p>
  <a href="{{ url('/services') }}" class="cta-button bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300">Zistiť viac o službách</a>
</div>
@endsection
