<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            'nik' => 'required|unique:users,nik',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'ktp' => 'required|file|max:2048|mimes:jpeg,png,jpg',
            'jenis_kelamin' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong',
            'nik.required' => 'NIK tidak boleh kosong',
            'nik.unique' => 'Nik sudah digunakan',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'ktp.required' => 'File KTP tidak boleh kosong',
            'ktp.mimes' => 'File harus berformat jpeg, png, atau jpg',
            'ktp.max' => 'Ukuran file maksimal 2 Mb',
            'jenis_kelamin.numeric' => 'Jenis Kelamin tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password_confirmation.required' => 'Konfirmasi password tidak boleh kosong',
            'password_confirmation.same' => 'Konfirmasi password tidak sesuai',
            'no_telepon.required' => 'Nomor Telepon tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah digunakan',
        ];
    }
}
