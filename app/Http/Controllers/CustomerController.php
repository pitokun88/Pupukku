<?php

namespace App\Http\Controllers;

use App\Models\Pupuk;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Constructor - Apply customer middleware
     */
    public function __construct()
    {
        $this->middleware(['auth', 'customer']);
    }

    /**
     * Show customer dashboard
     */
    public function dashboard()
    {
        $pupukTersedia = Pupuk::where('stok', '>', 0)->count();
        $pupukHabis = Pupuk::where('stok', '=', 0)->count();

        return view('customer.dashboard', compact('pupukTersedia', 'pupukHabis'));
    }

    /**
     * Display listing of available pupuk
     */
    public function index(Request $request)
    {
        $query = Pupuk::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_pupuk', 'like', '%' . $request->search . '%')
                  ->orWhere('jenis_pupuk', 'like', '%' . $request->search . '%');
        }

        // Filter by jenis
        if ($request->has('jenis') && $request->jenis != '') {
            $query->where('jenis_pupuk', $request->jenis);
        }

        $pupuk = $query->latest()->paginate(12);
        $jenisPupuk = Pupuk::distinct()->pluck('jenis_pupuk');

        return view('customer.pupuk.index', compact('pupuk', 'jenisPupuk'));
    }

    /**
     * Display the specified pupuk detail
     */
    public function show(Pupuk $pupuk)
    {
        return view('customer.pupuk.show', compact('pupuk'));
    }
}