@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard Admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <!-- Total Pupuk Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                <i class="fas fa-leaf text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Jenis Pupuk</p>
                <p class="text-2xl font-bold text-gray-800">{{ $totalPupuk }}</p>
            </div>
        </div>
    </div>

    <!-- Total Stok Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                <i class="fas fa-boxes text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Stok</p>
                <p class="text-2xl font-bold text-gray-800">{{ $totalStok }}</p>
            </div>
        </div>
    </div>

    <!-- Pupuk Hampir Habis Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-red-100 text-red-600 mr-4">
                <i class="fas fa-exclamation-triangle text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Stok Menipis (≤10)</p>
                <p class="text-2xl font-bold text-gray-800">{{ $pupukHabis }}</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-bold mb-4">Selamat Datang, {{ auth()->user()->name }}!</h3>
    <p class="text-gray-600">Anda login sebagai <span class="font-semibold text-green-600">Administrator</span></p>
    <p class="text-gray-600 mt-2">Kelola data pupuk Toko Berkah Abadi dengan mudah.</p>
    
    <div class="mt-6">
        <a href="{{ route('admin.pupuk.index') }}" class="inline-block bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
            <i class="fas fa-leaf mr-2"></i>
            Kelola Data Pupuk
        </a>
    </div>
</div>
@endsection