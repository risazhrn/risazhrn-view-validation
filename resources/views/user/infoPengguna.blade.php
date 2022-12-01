@extends('layouts.extendsLayout')
@section('header')
    {{ __('Info User') }}
@endsection


@section('content')
    <form action="" method="get">
        @csrf

        <!-- ID -->
        <div class="mt-4">
            <x-input-label for="id" :value="__('ID Pengguna')" />

            <x-text-input id="id" class="block mt-1 w-full" type="text" name="id" :value="$user->id" readonly />

        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />

            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="$user->username" readonly />

        </div>

        <!-- Full Name -->
        <div class="mt-4">
            <x-input-label for="fullname" :value="__('Full Name')" />

            <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="$user->fullname" readonly />

        </div>


        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email"
                readonly />

        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />

            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$user->address"
                readonly />

        </div>

        <!-- Birthdate -->
        <div class="mt-4">
            <x-input-label for="birthdate" :value="__('Birthdate')" />

            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="$user->birthdate"
                readonly />

        </div>

        <!-- Phone Number -->
        <div class="mt-4 mb-4">
            <x-input-label for="phoneNumber" :value="__('Phone Number')" />

            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber" :value="$user->phoneNumber"
                readonly />

        </div>


    </form>
@endsection
