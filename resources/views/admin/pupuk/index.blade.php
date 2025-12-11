@extends('layouts.admin')

@section('title', 'Data Pupuk')
@section('header', 'Manajemen Data Pupuk')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-bold">Daftar Pupuk</h3>
        <a href="{{ route('admin.pupuk.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Pupuk
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">No</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Foto</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Nama Pupuk</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Jenis</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Stok</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Harga</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($pupuk as $index => $item)
                <tr>
                    <td class="px-4 py-3 text-sm">{{ $pupuk->firstItem() + $index }}</td>
                    <td class="px-4 py-3">
                        @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_pupuk }}" class="w-16 h-16 object-cover rounded">
                        @else
                        <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                            <i class="fas fa-leaf text-gray-400"></i>
                        </div>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm font-medium">{{ $item->nama_pupuk }}</td>
                    <td class="px-4 py-3 text-sm">{{ $item->jenis_pupuk }}</td>
                    <td class="px-4 py-3 text-sm">
                        <span class="px-2 py-1 rounded {{ $item->stok <= 10 ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                            {{ $item->stok }} {{ $item->satuan }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td class="px-4 py-3 text-sm">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.pupuk.show', $item->id) }}" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.pupuk.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.pupuk.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                        Belum ada data pupuk
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $pupuk->links() }}
    </div>
</div>
@endsection