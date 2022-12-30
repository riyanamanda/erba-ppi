<?php

namespace App\Http\Requests\Ruang;

use Illuminate\Foundation\Http\FormRequest;

class RuangRawatInapStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => ['required', 'unique:ruang_rawat_inap', 'string', 'max:255'],
            'kelas' => ['required', 'string', 'max:255']
        ];
    }
}
