<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaryawanRequest extends FormRequest
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
            'id_peran' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:1,2',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'username' => 'required|unique:karyawan,username,'.$this->segment(2),
            'password' => 'sometimes|required|confirmed',
        ];
    }
}
