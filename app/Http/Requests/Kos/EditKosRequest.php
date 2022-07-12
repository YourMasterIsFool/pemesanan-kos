<?php

namespace App\Http\Requests\Kos;

use Illuminate\Foundation\Http\FormRequest;

class EditKosRequest extends FormRequest
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
            'nomor_telepon' => 'required',
            'fasilitas' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'harga_sewa' => 'required',
            'jumlah_kamar' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'nomor_telepon.required' => 'Nomor Telepon tidak boleh kosong',
            'fasilitas.required' => 'Fasilitas tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'harga_sewa.required' => 'Harga sewa tidak boleh kosong',
            'jumlah_kamar.required' => 'Jumlah kamar tidak boleh kosong',
            'latitude.required' => 'Latitude tidak boleh kosong',
            'longitude.required' => 'Longitude tidak boleh kosong',
        ];
    }
}
