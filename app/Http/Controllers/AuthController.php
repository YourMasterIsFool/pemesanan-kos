<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\TipeKos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    public function loginView()
    {
        return view('dashboard.auth.login');
    }

    public function registerView()
    {
        $jenis_kelamin = TipeKos::all();
        return view('dashboard.auth.register', compact('jenis_kelamin'));
    }


    public function profileView(Request $request)
    {
        $user = $request->user();

        return view('dashboard.auth.profil.index', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $user = $request->user();
        $password_lama = $request->password_lama;
        $password_baru = $request->password_baru;
        $oldPasswordValid = Hash::check($password_lama, $user->password);
        $newPasswordValid = $password_baru !== null;

        if (isset($request->photo)) {
            $filePath = Storage::disk('local')->put('images', $request->photo);
            $fileName = explode('/', $filePath)[1];

            $user->update([
                'username' => $request->username,
                'name' => $request->name,
                'photo' => $fileName,
            ]);

            Alert::success('info', 'Profil berhasil diupdate');
            return back();
        } elseif (isset($password_lama)) {
            if (!$oldPasswordValid) {
                Alert::error('info', 'Password lama salah');
                return back();
            }

            if (!$newPasswordValid) {
                Alert::error('info', 'Password baru harus diisi');
                return back();
            }

            $user->update([
                'username' => $request->username,
                'name' => $request->name,
                'password' => Hash::make($password_baru)
            ]);

            Alert::success('info', 'Profil berhasil diupdate');
            return back();
        } elseif (isset($request->name) && isset($request->username)) {
            $user->update([
                'username' => $request->username,
                'name' => $request->name
            ]);

            Alert::success('info', 'Profil berhasil diupdate');
            return back();
        }
    }


    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        
        $validated['password'] = Hash::make($validated['password']);

        $fileName = $request->ktp->getClientOriginalName();
        $path_foto_ktp = public_path() . "/ktp";
        $request->ktp->move($path_foto_ktp, $fileName);

        $user = User::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'alamat' => $validated['alamat'],
            'nomor_telepon' => $validated['no_telepon'],
            'nik' => $validated['nik'],
            'foto_ktp' => $fileName,
            'jenis_kelamin' => $validated['jenis_kelamin']
        ]);
        $user->roles()->attach(3);

        auth()->login($user);

        Alert::success('info', 'Registrasi Berhasil');
        return redirect()->route('client.welcome')->with('pesan', 'berhasil login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);


        $cekEmail = User::where('email', $validated['email'])->get();

        if (count($cekEmail->all()) > 0 == false) {
            Alert::error('error', 'Email tidak ditemukan');
            return redirect()->route('user.login.view');
        }

        $passwordValid = Hash::check($request->password, $cekEmail[0]['password']);
        if (!$passwordValid) {
            Alert::error('error', 'Password salah');
            return redirect()->route('user.login.view');
        }

        if (Auth::attempt($validated)) {
            $user = Auth::user();
            $roles = $user->roles[0]->role;
            if ($roles === 'Admin') {
                $request->session()->regenerate();
                Alert::success('info', 'Login Admin Berhasil');
                return redirect()->route('dashboard.admin.index')->with('pesan', 'berhasil login');
            } else if ($roles === 'Penyewa') {
                $request->session()->regenerate();
                Alert::success('info', 'Login Berhasil');
                return redirect()->route('client.welcome')->with('pesan', 'berhasil login');
            } else if ($roles === 'Pemilik') {
                $request->session()->regenerate();
                Alert::success('info', 'Login Pemilik Kos Berhasil');
                return redirect()->route('dashboard.pemilik.index')->with('pesan', 'berhasil login');
            }
        }

        Alert::success('error', 'Cek Email dan Password');
        return redirect()->route('user.login.view');
    }
}
