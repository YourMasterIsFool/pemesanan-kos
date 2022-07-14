<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.Pemesanan.index');
    }

    public function detail($id)
    {
        return view('dashboard.admin.Pemesanan.detail');
    }
}
