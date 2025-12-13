<?php

namespace App\Http\Controllers;

use App\Models\Pupuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalPupuk = Pupuk::count();
        $totalStok = Pupuk::sum('stok');
        $pupukHabis = Pupuk::where('stok', '<=', 10)->count();

        return view('admin.dashboard', compact('totalPupuk', 'totalStok', 'pupukHabis'));
    }

    public function index()
    {
        $pupuk = Pupuk::latest()->paginate(10);
        return view('admin.pupuk.index', compact('pupuk'));
    }

    public function create()
    {
        return view('admin.pupuk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pupuk' => 'required|string|max:255',
            'jenis_pupuk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|in:kg,karung,liter',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pupuk', 'public');
        }

        Pupuk::create($validated);

        return redirect()->route('admin.pupuk.index')
            ->with('success', 'Data pupuk berhasil ditambahkan!');
    }

    public function show(Pupuk $pupuk)
    {
        return view('admin.pupuk.show', compact('pupuk'));
    }

    public function edit(Pupuk $pupuk)
    {
        return view('admin.pupuk.edit', compact('pupuk'));
    }

    public function update(Request $request, Pupuk $pupuk)
    {
        $validated = $request->validate([
            'nama_pupuk' => 'required|string|max:255',
            'jenis_pupuk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'satuan' => 'required|in:kg,karung,liter',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($pupuk->foto) {
                Storage::disk('public')->delete($pupuk->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pupuk', 'public');
        }

        $pupuk->update($validated);

        return redirect()->route('admin.pupuk.index')
            ->with('success', 'Data pupuk berhasil diperbarui!');
    }

    public function destroy(Pupuk $pupuk)
    {
        if ($pupuk->foto) {
            Storage::disk('public')->delete($pupuk->foto);
        }

        $pupuk->delete();

        return redirect()->route('admin.pupuk.index')
            ->with('success', 'Data pupuk berhasil dihapus!');
    }
}
