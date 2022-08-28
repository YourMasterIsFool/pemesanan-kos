<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CatatanController extends Controller
{
    public function index()
    {
        $catatans = Catatan::all();
        return view('dashboard.admin.Catatan.index', compact('catatans'));
    }

    public function createView()
    {
        return view('dashboard.admin.Catatan.create');
    }

    public function save(Request $request)
    {
        $catatan = Catatan::create([
            'nama' => $request->nama,
            'nomor_kamar' => $request->nomor_kamar,
            'bulan' => $request->bulan,
            'jumlah' => $request->jumlah
        ]);

        Alert::success('info', 'Catatan berhasil ditambahkan');
        return redirect()->route('admin.catatan.index');
    }

    public function editView($id)
    {
        $catatan = Catatan::find($id);
        return view('dashboard.admin.Catatan.edit', compact('catatan'));
    }

    public function editSave(Request $request, $id)
    {
        $catatan = Catatan::find($id);

        $catatan->update([
            'nama' => $request->nama,
            'nomor_kamar' => $request->nomor_kamar,
            'bulan' => $request->bulan,
            'jumlah' => $request->jumlah
        ]);

        
        Alert::success('info', 'Catatan berhasil diupdate');
        return redirect()->route('admin.catatan.index');
    }

    public function delete($id)
    {
        $catatan = Catatan::find($id);

        $catatan->delete();

        Alert::success('info', 'Catatan berhasil dihapus');
        return redirect()->route('admin.catatan.index');
    }
}
