<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\EditPemilikRequest;
use App\Http\Requests\Admin\TambahPemilikRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class DaftarPemilikController extends Controller
{
    private $ROLE_ADMIN = 1;
    private $ROLE_PEMILIK = 2;
    private $ROLE_PENYEWA = 3;

    public function index()
    {
        $pemilik = DB::table('user_role')
            ->join('users', 'user_role.user_id', '=', 'users.id')
            ->join('roles', 'user_role.role_id', '=', 'roles.id')
            ->select('users.id as id_user', 'users.nama', 'users.email', 'users.nomor_telepon', 'users.alamat')
            ->where('roles.id', '=', $this->ROLE_PEMILIK)
            ->get()->toArray();

        return view('dashboard.admin.Pemilik.index', compact('pemilik'));
    }


    public function createView()
    {
        return view('dashboard.admin.Pemilik.create');
    }


    public function save(TambahPemilikRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $pemilik_baru = User::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'alamat' => $validated['alamat'],
            'nomor_telepon' => $validated['no_telepon'],
        ]);
        $pemilik_baru->roles()->attach($this->ROLE_PEMILIK);

        Alert::success('info', 'Pemilik berhasil ditambahkan');
        return redirect()->route('dashboard.daftarpemilik.index');
    }


    public function editView($id)
    {
        $pemilik = User::find($id);
        return view('dashboard.admin.Pemilik.edit', compact('pemilik'));
    }


    public function editSave(EditPemilikRequest $request, $id)
    {
        $validated  = $request->validated();
        $pemilik = User::find($id);

        if (!$request->password) {
            $pemilik->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'nomor_telepon' => $request->no_telepon,
            ]);
            Alert::success('info', 'Pemilik berhasil diupdate');
            return redirect()->route('dashboard.daftarpemilik.index');
        } else if ($request->password) {
            $new_password = Hash::make($request->password);
            $pemilik->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'password' => $new_password,
                'nomor_telepon' => $request->no_telepon,
            ]);

            Alert::success('info', 'Pemilik berhasil diupdate');
            return redirect()->route('dashboard.daftarpemilik.index');
        }
    }


    public function delete($id)
    {
        $pemilik = User::find($id);

        $pemilik->delete();

        Alert::success('info', 'Pemilik berhasil dihapus');
        return redirect()->route('dashboard.daftarpemilik.index');
    }
}
