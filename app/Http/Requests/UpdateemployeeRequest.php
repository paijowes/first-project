<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateemployeeRequest extends FormRequest
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
            'txtgender' => 'required',
            'txtemail' => [
                'required',
                Rule::unique('employees', 'email')->ignore($this->txtnip, 'nip'),
                'email',
            ],
            'txtnotelp' => [
                'required',
                Rule::unique('employees', 'notelp')->ignore($this->txtnip, 'nip'),
                'numeric',
            ],
            'txtalamat' => 'required',
        ];
    }

    public function messages(): array
{
    return [
        'txtname.required' => 'Nama tidak boleh kosong',
        'txtnotelp.required' => 'No telp tidak boleh kosong',
        'txtemail.unique' => 'Email sudah ada di dalam tabel',
        'txtalamat.required' => 'Alamat tidak boleh kosong',
        'txtgender.required' => 'Tidak boleh kosong'
    ];
}

}
