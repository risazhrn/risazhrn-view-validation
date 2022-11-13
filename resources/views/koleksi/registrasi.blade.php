@extends('layouts.extendsLayout')
@section('header')
    {{ __('Tambah Koleksi') }}
@endsection

@section('content')
    <form action="{{ route('koleksiStore') }}" method="post">
        @csrf
        <!-- Nama Koleksi -->
        <div>
            <x-input-label for="namaKoleksi" :value="__('Nama Koleksi')" />

            <x-text-input id="namaKoleksi" class="block mt-1 w-full" type="text" name="namaKoleksi" :value="old('namaKoleksi')"
                required autofocus />

            <x-input-error :messages="$errors->get('namaKoleksi')" class="mt-2" />
        </div>

        <!-- Jenis Koleksi -->
        <div class="mt-4">
            <x-input-label for="jenisKoleksi" :value="__('Jenis Koleksi')" />

            <select name="jenisKoleksi" id="jenisKoleksi" class="block block mt-1 w-full">
                <option selected>--- Select ---</option>
                <option value="1">Buku</option>
                <option value="2">Majalah</option>
                <option value="3">Cakram Digital</option>
            </select>
        </div>

        <!-- Jumlah Koleksi -->
        <div class="mt-4">
            <x-input-label for="jumlahKoleksi" :value="__('JumlahKoleksi')" />

            <x-text-input id="jumlahKoleksi" class="block mt-1 w-full" type="number" name="jumlahKoleksi" :value="old('jumlahKoleksi')"
                required />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Tambah Koleksi') }}
            </x-primary-button>
        </div>

    </form>
@endsection
