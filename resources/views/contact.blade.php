@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 md:p-8">
    <div class="card">
        <h2 class="text-3xl md:text-4xl font-semibold mb-4">Kontakt</h2>
        <p class="text-lg md:text-xl text-gray-700 mb-4">Pre viac informácií alebo rezerváciu termínu nás kontaktujte:</p>
        <p class="text-lg md:text-xl">Email: <a href="mailto:servis@autoservis.sk" class="text-yellow-500 hover:underline">servis@autoservis.sk</a></p>
        <p class="text-lg md:text-xl">Telefón: +421 99 999 9999</p>
    </div>

    <div class="card mt-6">
        <h2 class="text-3xl md:text-4xl font-semibold mb-4">Nájdite nás</h2>
        <p class="text-lg md:text-xl text-gray-700">Naša prevádzka sa nachádza na adrese Horská 12, 821 10 Podlesie, Slovensko. Sme tu pre vás každý pracovný deň od 8:00 do 16:00.</p>
    </div>

    <div class="card mt-6">
        <h2 class="text-3xl md:text-4xl font-semibold mb-4">Máte otázky? Neváhajte nás kontaktovať</h2>
        <form id="contactForm" class="container mx-auto p-4 md:p-8 bg-white rounded-lg shadow-md mt-8">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold">Meno:</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded" required minlength="3">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold">Email:</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-bold">Správa:</label>
                <textarea id="message" name="message" rows="4" class="w-full p-2 border border-gray-300 rounded" required minlength="10"></textarea>
            </div>
            <button type="submit" class="cta-button bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-300">Odoslať správu</button>
        </form>
    </div>
</div>
@endsection
