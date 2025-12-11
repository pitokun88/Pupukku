@extends('layouts.customer')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h2 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
    <p class="text-gray-600 mt-2">Temukan pupuk berkualitas untuk tanaman Anda</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                <i class="fas fa-leaf text-3xl"></i>
            </div>
            <div>
                <p class="text-gray-500">Pupuk Tersedia</p>
                <p class="text-3xl font-bold text-gray-800">{{ $pupukTersedia }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-red-100 text-red-600 mr-4">
                <i class="fas fa-exclamation-circle text-3xl"></i>
            </div>
            <div>
                <p class="text-gray-500">Stok Habis</p>
                <p class="text-3xl font-bold text-gray-800">{{ $pupukHabis }}</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-gradient-to-r from-green-600 to-green-700 rounded-lg shadow-lg p-8 text-white">
    <h3 class="text-2xl font-bold mb-4">Toko Pupuk Berkah Abadi</h3>
    <p class="mb-6">Menyediakan berbagai jenis pupuk berkualitas untuk kebutuhan pertanian Anda</p>
    <a href="{{ route('customer.pupuk.index') }}" class="inline-block bg-white text-green-600 px-6 py-3 rounded-lg font-semibold hover:bg-green-50 transition">
        <i class="fas fa-shopping-bag mr-2"></i>
        Lihat Katalog Pupuk
    </a>
</div>
@endsection