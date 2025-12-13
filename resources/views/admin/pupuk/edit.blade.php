@extends('layouts.admin')

@section('title', 'Edit Pupuk')
@section('header', 'Edit Data Pupuk')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ route('admin.pupuk.update', $pupuk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Nama Pupuk *</label>
                <input type="text" name="nama_pupuk" value="{{ old('nama_pupuk', $pupuk->nama_pupuk) }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Jenis Pupuk *</label>
                <input type="text" name="jenis_pupuk" value="{{ old('jenis_pupuk', $pupuk->jenis_pupuk) }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="md:col-span-2">
                <label class="block text-gray-700 font-semibold mb-2">Deskripsi *</label>
                <textarea name="deskripsi" rows="4" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('deskripsi', $pupuk->deskripsi) }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Stok *</label>
                <input type="number" name="stok" value="{{ old('stok', $pupuk->stok) }}" required min="0"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Satuan *</label>
                <select name="satuan" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="kg" {{ $pupuk->satuan == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                    <option value="karung" {{ $pupuk->satuan == 'karung' ? 'selected' : '' }}>Karung</option>
                    <option value="liter" {{ $pupuk->satuan == 'liter' ? 'selected' : '' }}>Liter</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Harga (Rp) *</label>
                <input type="number" name="harga" value="{{ old('harga', $pupuk->harga) }}" required min="0"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Foto Pupuk</label>
                @if($pupuk->foto)
                <img src="{{ asset('storage/' . $pupuk->foto) }}" alt="Current" class="w-32 h-32 object-cover mb-2">
                @endif
                <input type="file" name="foto" accept="image/*"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
        </div>

        <div class="flex justify-end space-x-4 mt-6">
            <a href="{{ route('admin.pupuk.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-100">
                Batal
            </a>
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                <i class="fas fa-save mr-2"></i>Update
            </button>
        </div>
    </form>
</div>
@endsection