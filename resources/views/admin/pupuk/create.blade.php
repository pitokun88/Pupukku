@extends('layouts.admin')

@section('title', 'Tambah Pupuk')
@section('header', 'Tambah Data Pupuk')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ route('admin.pupuk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Nama Pupuk *</label>
                <input type="text" name="nama_pupuk" value="{{ old('nama_pupuk') }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('nama_pupuk') border-red-500 @enderror">
                @error('nama_pupuk')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Jenis Pupuk *</label>
                <input type="text" name="jenis_pupuk" value="{{ old('jenis_pupuk') }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('jenis_pupuk') border-red-500 @enderror"
                    placeholder="contoh: Nitrogen, NPK, Organik">
                @error('jenis_pupuk')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-gray-700 font-semibold mb-2">Deskripsi *</label>
                <textarea name="deskripsi" rows="4" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Stok *</label>
                <input type="number" name="stok" value="{{ old('stok') }}" required min="0"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('stok') border-red-500 @enderror">
                @error('stok')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Satuan *</label>
                <select name="satuan" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="kg" {{ old('satuan') == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                    <option value="karung" {{ old('satuan') == 'karung' ? 'selected' : '' }}>Karung</option>
                    <option value="liter" {{ old('satuan') == 'liter' ? 'selected' : '' }}>Liter</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Harga (Rp) *</label>
                <input type="number" name="harga" value="{{ old('harga') }}" required min="0"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('harga') border-red-500 @enderror">
                @error('harga')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Foto Pupuk</label>
                <input type="file" name="foto" accept="image/*"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG (Max: 2MB)</p>
            </div>
        </div>

        <div class="flex justify-end space-x-4 mt-6">
            <a href="{{ route('admin.pupuk.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-100">
                Batal
            </a>
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                <i class="fas fa-save mr-2"></i>Simpan
            </button>
        </div>
    </form>
</div>
@endsection