<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class CatatanController extends Controller
{
    public function index(Request $request)
    {
        $input_bulan = $request->input('bulan');
        $bulans = $this->bulan();
        // dd($input_bulan);
        // dd($bulans);

        if ($input_bulan === 'all' || $input_bulan === null) {
            $catatans = Catatan::all();
            return view('dashboard.admin.Catatan.index', compact('catatans', 'input_bulan', 'bulans'));
        }
        $catatans = Catatan::where('bulan', $input_bulan)->get();
        return view('dashboard.admin.Catatan.index', compact('catatans', 'input_bulan', 'bulans'));
    }

    public function bulan()
    {
        return [
            "Januari" => "Januari",
            "Februari" => "Februari",
            "Maret" => "Maret",
            "April" => "April",
            "Mei" => "Mei",
            "Juni" => "Juni",
            "Juli" => "Juli",
            "Agustus" => "Agustus",
            "September" => "September",
            "Oktober" => "Oktober",
            "November" => "November",
            "Desember" => "Desember"
        ];
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

    public function cetak_catatan(Request $request)
    {

        $startMonth = date('Y-m-d', strtotime($request->get('start_month')));
        $endMonth = date('Y-m-d', strtotime($request->get('end_month')));

        // dd($endMonth);

        $listCatatan = Catatan::whereBetween('bulan', [$startMonth, $endMonth])->get();
        $totalPendapatan = $listCatatan->sum('jumlah');


        // dd($listCatatan);
        $data = array(
            'startMonth' => $startMonth,
            'endMonth' => $endMonth,
            'listCatatan' => $listCatatan,
            'totalPendapatan' => $totalPendapatan
        );



        $pdf = PDF::loadView('dashboard.admin.Catatan.cetak_pdf', $data);

        return $pdf->download('laporan-pegawai-pdf');
    }
}
