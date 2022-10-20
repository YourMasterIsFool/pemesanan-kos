<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadBuktiPembayaranRequest extends FormRequest
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
            'bukti' => 'required|file|max:2048|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'bukti.required' => 'File bukti pembayaran tidak boleh kosong',
            'bukti.max' => 'Ukuran file maksimal 2 Mb',
            'bukti.mimes' => 'File harus berformat jpeg, png, atau jpg',
        ];
    }
}
