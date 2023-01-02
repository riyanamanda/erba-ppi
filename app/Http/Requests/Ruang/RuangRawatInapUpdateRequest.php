<?php

namespace App\Http\Requests\Ruang;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RuangRawatInapUpdateRequest extends FormRequest
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
            'nama' => ['required', 'string', 'max:255', Rule::unique('ruang_rawat_inap', 'nama')->ignore($this->ruang_rawat_inap)],
            'kelas' => ['required', 'string', 'max:255'],
        ];
    }
}
