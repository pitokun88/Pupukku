@extends('layouts.customer')

@section('title', 'Katalog Pupuk')

@section('content')
<div class="mb-6">
    <h2 class="text-3xl font-bold text-gray-800">Katalog Pupuk</h2>
    <p class="text-gray-600 mt-2">Toko Berkah Abadi</p>
</div>

<!-- Filter & Search -->
<div class="bg-white rounded-lg shadow p-4 mb-6">
    <form method="GET" class="flex flex-col md:flex-row gap-4">
        <input type="text" name="search" value="{{ request('search') }}" 
            placeholder="Cari pupuk..." 
            class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        
        <select name="jenis" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            <option value="">Semua Jenis</option>
            @foreach($jenisPupuk as $jenis)
            <option value="{{ $jenis }}" {{ request('jenis') == $jenis ? 'selected' : '' }}>
                {{ $jenis }}
            </option>
            @endforeach
        </select>
        
        <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
            <i class="fas fa-search mr-2"></i>Cari
        </button>
    </form>
</div>

<!-- Pupuk Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse($pupuk as $item)
    <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
        @if($item->foto)
        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_pupuk }}" 
            class="w-full h-48 object-cover rounded-t-lg">
        @else
        <div class="w-full h-48 bg-gray-200 rounded-t-lg flex items-center justify-center">
            <i class="fas fa-leaf text-4xl text-gray-400"></i>
        </div>
        @endif
        
        <div class="p-4">
            <span class="inline-block px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full mb-2">
                {{ $item->jenis_pupuk }}
            </span>
            <h3 class="font-bold text-lg mb-2">{{ $item->nama_pupuk }}</h3>
            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $item->deskripsi }}</p>
            
            <div class="flex justify-between items-center mb-4">
                <span class="text-2xl font-bold text-green-600">
                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                </span>
                <span class="text-sm text-gray-600">/ {{ $item->satuan }}</span>
            </div>
            
            <div class="flex justify-between items-center">
                <span class="text-sm {{ $item->stok > 0 ? 'text-green-600' : 'text-red-600' }}">
                    @if($item->stok > 0)
                    <i class="fas fa-check-circle"></i> Stok: {{ $item->stok }}
                    @else
                    <i class="fas fa-times-circle"></i> Habis
                    @endif
                </span>
                <a href="{{ route('customer.pupuk.show', $item->id) }}" 
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 text-sm">
                    Detail
                </a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-12">
        <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500">Pupuk tidak ditemukan</p>
    </div>
    @endforelse
</div>

<div class="mt-6">
    {{ $pupuk->links() }}
</div>
@endsection