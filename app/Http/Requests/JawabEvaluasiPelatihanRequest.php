<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JawabEvaluasiPelatihanRequest extends FormRequest
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
            'evaluasi.*.karyawan' => 'required',
            'evaluasi.*.jawaban.*' => 'required|min:0|max:5',
        ];
    }
}
