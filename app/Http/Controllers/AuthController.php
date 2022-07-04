<?php

namespace App\Http\Controllers;

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
        return view('auth.login');
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function profileView(Request $request)
    {
        $user = $request->user();

        return view('dashboard.profil.index', compact('user'));
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

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:5'],
            'password_confirmation' => ['required']
        ]);


        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($request->only(['name', 'username', 'password']));
        $user->roles()->attach(1);

        auth()->login($user);

        Alert::success('info', 'Registrasi Berhasil');
        return redirect()->route('dashboard.index')->with('pesan', 'berhasil register');
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
            'username' => ['required'],
            'password' => ['required', 'min:5']
        ]);


        $cekUsername = User::where('username', $validated['username'])->get();

        if (count($cekUsername->all()) > 0 == false) {
            Alert::error('error', 'Username tidak ditemukan');
            return redirect()->route('user.login.view');
        }

        $passwordValid = Hash::check($request->password, $cekUsername[0]['password']);
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
                return redirect()->route('dashboard.index')->with('pesan', 'berhasil login');
            } else if ($roles === 'Pengurus LMY') {
                $request->session()->regenerate();
                Alert::success('info', 'Login Pemilik Kos Berhasil');
                return redirect()->route('dashboard.index')->with('pesan', 'berhasil login');
            } else if ($roles === 'Kepala TPQ / RTQ') {
                $request->session()->regenerate();
                Alert::success('info', 'Login Berhasil');
                return redirect()->route('dashboard.index')->with('pesan', 'berhasil login');
            }
        }

        Alert::success('error', 'Cek Email dan Password');
        return redirect()->route('user.login.view');
    }
}
