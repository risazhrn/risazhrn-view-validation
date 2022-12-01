@extends('layouts.extendsLayout')
@section('header')
    {{ __('Update Koleksi') }}
@endsection

@section('content')
    <form action="{{ route('koleksiUpdate', $collection) }}" method="post">
        @method('put')
        @csrf
        <!-- ID Koleksi -->
        <div>
            <x-input-label for="id" :value="__('ID Koleksi')" />
            <x-text-input id="id" class="block mt-1 w-full" type="text" name="id" :value="$collection->id" disabled />
        </div>

        <!-- Nama Koleksi -->
        <div>
            <x-input-label for="namaKoleksi" :value="__('Nama Koleksi')" />

            <x-text-input id="namaKoleksi" class="block mt-1 w-full" type="text" name="namaKoleksi" :value="old('namaKoleksi', $collection->namaKoleksi)" />
            <x-input-error :messages="$errors->get('namaKoleksi')" class="mt-2" />

        </div>

        <!-- Jenis Koleksi -->
        <div class="mt-4">
            <x-input-label for="jenisKoleksi" :value="__('Jenis Koleksi')" />

            <select id="jenis" name="jenisKoleksi" id="jenisKoleksi" class="block block mt-1 w-full" required>
                <option value="-1" @if (old('jenisKoleksi', $collection->jenisKoleksi) == -1) selected @endif>Pilih satu</option>
                <option value="1" @if (old('jenisKoleksi', $collection->jenisKoleksi) == 1) selected @endif>Buku</option>
                <option value="2" @if (old('jenisKoleksi', $collection->jenisKoleksi) == 2) selected @endif>Majalah</option>
                <option value="3" @if (old('jenisKoleksi', $collection->jenisKoleksi) == 3) selected @endif>Cakram Digital</option>
            </select>
            <x-input-error :messages="$errors->get('jenisKoleksi')" class="mt-2" />

        </div>

        <!-- Jumlah Awal Koleksi -->
        <div class="mt-4">
            <x-input-label for="jumlahAwal" :value="__('Jumlah Awal')" />
            <x-text-input id="jumlahAwal" class="block mt-1 w-full" type="number" name="jumlahAwal" :value="$collection->jumlahAwal"
                disabled />

        </div>

        <!-- Jumlah Sisa Koleksi -->
        <div class="mt-4">
            <x-input-label for="jumlahSisa" :value="__('Jumlah Sisa')" />
            <x-text-input id="jumlahSisa" class="block mt-1 w-full" type="number" name="jumlahSisa" :value="$collection->jumlahSisa"
                disabled />
        </div>

        <!-- Jumlah Keluar -->
        <div class="mt-4">
            <x-input-label for="jumlahKeluar" :value="__('Jumlah Keluar')" />
            <x-text-input id="jumlahKeluar" class="block mt-1 w-full" type="number" name="jumlahKeluar"
                :value="old('jumlahKeluar', $collection->jumlahKeluar)" />
            <x-input-error :messages="$errors->get('jumlahKeluar')" class="mt-2" />

        </div>

        <div class="flex items-center justify-end mt-4">
            <x-secondary-button class="ml-4">
                {{ __('Update') }}
            </x-secondary-button>
            <x-primary-button type="reset" class="ml-4">
                {{ __('Reset') }}
            </x-primary-button>
        </div>
    </form>
@endsection
