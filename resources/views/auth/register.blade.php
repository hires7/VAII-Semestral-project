@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 md:p-10 rounded-lg shadow-lg max-w-md mx-auto">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-indigo-600 mb-6">Vytvoriť účet</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="name" :value="__('Meno')" class="text-lg font-semibold text-gray-700 dark:text-gray-200"/>
            <x-text-input id="name" class="block mt-2 w-full p-3 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 focus:ring-2 focus:ring-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500"/>
        </div>

        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-lg font-semibold text-gray-700 dark:text-gray-200"/>
            <x-text-input id="email" class="block mt-2 w-full p-3 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 focus:ring-2 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500"/>
        </div>


        <div class="mb-4 relative">
            <x-input-label for="password" :value="__('Heslo')" class="text-lg font-semibold text-gray-700 dark:text-gray-200"/>
            <x-text-input id="password" class="block mt-2 w-full p-3 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 focus:ring-2 focus:ring-indigo-500" type="password" name="password" required autocomplete="new-password" />
            <button type="button" id="togglePassword" class="absolute right-2 top-9 text-gray-500">
                Zobraziť
            </button>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500"/>
        </div>


        <div class="mb-4 relative">
            <x-input-label for="password_confirmation" :value="__('Potvrď heslo')" class="text-lg font-semibold text-gray-700 dark:text-gray-200"/>
            <x-text-input id="password_confirmation" class="block mt-2 w-full p-3 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-900 focus:ring-2 focus:ring-indigo-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            <button type="button" id="toggleConfirmPassword" class="absolute right-2 top-9 text-gray-500">
                Zobraziť
            </button>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500"/>
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="text-sm text-indigo-600 hover:text-indigo-500 font-semibold focus:outline-none" href="{{ route('login') }}">
                {{ __('Už máš účet?') }}
            </a>

            <x-primary-button class="ml-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition-all duration-300">
                {{ __('Registrovať sa') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
