@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 md:p-10 rounded-lg shadow-lg max-w-md mx-auto">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 dark:text-white mb-6">Prihlásenie do systému</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-lg font-semibold text-gray-700 dark:text-gray-200"/>
            <x-text-input id="email" class="block mt-2 w-full p-3 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 focus:ring-2 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500"/>
        </div>

        <div class="mb-4 relative">
            <x-input-label for="password" :value="__('Heslo')" class="text-lg font-semibold text-gray-700 dark:text-gray-200"/>
            <x-text-input id="password" class="block mt-2 w-full p-3 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 focus:ring-2 focus:ring-indigo-500" type="password" name="password" required autocomplete="current-password" />
            <button type="button" id="togglePassword" class="absolute right-2 top-9 text-gray-500">
                Zobraziť
            </button>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500"/>
        </div>

        <div class="flex items-center mb-4">
            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-700 dark:text-gray-200 font-medium">
                {{ __('Pamätaj si ma') }}
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline font-semibold focus:outline-none" href="{{ route('password.request') }}">
                    {{ __('Zabudnuté heslo?') }}
                </a>
            @endif

            <x-primary-button class="ml-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition-all duration-300">
                {{ __('Prihlásiť sa') }}
            </x-primary-button>
        </div>
    </form>
</div>

@endsection
