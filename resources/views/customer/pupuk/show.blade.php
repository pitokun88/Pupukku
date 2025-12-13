@extends('layouts.customer')

@section('title', 'Detail Pupuk')

@section('content')
<div class="mb-6">
    <a href="{{ route('customer.pupuk.index') }}" class="text-green-600 hover:underline">
        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Katalog
    </a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            @if($pupuk->foto)
            <img src="{{ asset('storage/' . $pupuk->foto) }}" alt="{{ $pupuk->nama_pupuk }}" 
                class="w-full rounded-lg">
            @else
            <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                <i class="fas fa-leaf text-8xl text-gray-400"></i>
            </div>
            @endif
        </div>

        <div class="space-y-6">
            <div>
                <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm mb-2">
                    {{ $pupuk->jenis_pupuk }}
                </span>
                <h1 class="text-3xl font-bold text-gray-800">{{ $pupuk->nama_pupuk }}</h1>
            </div>

            <div>
                <h3 class="font-semibold text-gray-700 mb-2">Deskripsi:</h3>
                <p class="text-gray-600">{{ $pupuk->deskripsi }}</p>
            </div>

            <div class="border-t pt-4">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-600">Harga:</span>
                    <span class="text-3xl font-bold text-green-600">
                        Rp {{ number_format($pupuk->harga, 0, ',', '.') }}
                    </span>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-600">Satuan:</span>
                    <span class="font-semibold">{{ $pupuk->satuan }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Ketersediaan:</span>
                    <span class="font-semibold {{ $pupuk->stok > 0 ? 'text-green-600' : 'text-red-600' }}">
                        @if($pupuk->stok > 0)
                        <i class="fas fa-check-circle"></i> Tersedia ({{ $pupuk->stok }} {{ $pupuk->satuan }})
                        @else
                        <i class="fas fa-times-circle"></i> Stok Habis
                        @endif
                    </span>
                </div>
            </div>

            <div class="bg-blue-50 p-4 rounded-lg">
                <p class="text-sm text-gray-700">
                    <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                    Untuk pembelian, silakan hubungi Toko Berkah Abadi
                </p>
            </div>
        </div>
    </div>
</div>
@endsection