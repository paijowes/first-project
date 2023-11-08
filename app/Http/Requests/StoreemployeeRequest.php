<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreemployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'txtname' => 'required',
            'txtnip' => 'required|unique:employees,nip|min:8|max:10',
            'txtgender' => 'required',
            'txtemail' => 'required|email|unique:employees,email',
            'txtnotelp' => 'required|numeric|unique:employees,notelp',
            'txtalamat' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'txtnip.required' => 'NIP Tidak Boleh Kosong',
            'txtnip.unique' => 'NIP sudah ada di dalam tabel',
            'txtname.required' => 'Nama tidak boleh kosong',
            'txtnotelp.required' => 'No telp tidak boleh kosong',
            'txtnotelp.unique' => 'No telp sudah ada di dalam tabel',
            'txtemail.required' => 'Email tidak boleh kosong',
            'txtemail.unique' => 'Email sudah ada di dalam tabel',
            'txtalamat.required' => 'Alamat tidak boleh kosong',
            'txtgender.required' => 'Tidak boleh kosong'
        ];

    }
}
