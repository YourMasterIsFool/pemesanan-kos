<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TambahPemilikRequest extends FormRequest
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
            'alamat' => 'required',
            'no_telepon' => 'required',
            'password' => 'required',
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
            'jenis_kelamin.string' => 'Jenis Kelamin tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'no_telepon.required' => 'Nomor Telepon tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah digunakan',
        ];
    }
}
