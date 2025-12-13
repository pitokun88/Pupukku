@extends('layouts.admin')

@section('title', 'Detail Pupuk')
@section('header', 'Detail Data Pupuk')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            @if($pupuk->foto)
            <img src="{{ asset('storage/' . $pupuk->foto) }}" alt="{{ $pupuk->nama_pupuk }}" 
                class="w-full h-64 object-cover rounded-lg">
            @else
            <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                <i class="fas fa-leaf text-6xl text-gray-400"></i>
            </div>
            @endif
        </div>

        <div class="space-y-4">
            <div>
                <h3 class="text-2xl font-bold text-gray-800">{{ $pupuk->nama_pupuk }}</h3>
                <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm mt-2">
                    {{ $pupuk->jenis_pupuk }}
                </span>
            </div>

            <div>
                <label class="text-gray-600 font-semibold">Deskripsi:</label>
                <p class="text-gray-800">{{ $pupuk->deskripsi }}</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-gray-600 font-semibold">Stok:</label>
                    <p class="text-2xl font-bold text-gray-800">{{ $pupuk->stok }} {{ $pupuk->satuan }}</p>
                </div>
                <div>
                    <label class="text-gray-600 font-semibold">Harga:</label>
                    <p class="text-2xl font-bold text-green-600">Rp {{ number_format($pupuk->harga, 0, ',', '.') }}</p>
                </div>
            </div>

            <div class="flex space-x-4 pt-4">
                <a href="{{ route('admin.pupuk.edit', $pupuk->id) }}" 
                    class="px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <a href="{{ route('admin.pupuk.index') }}" 
                    class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-100">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection