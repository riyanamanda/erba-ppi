<?php

namespace App\Http\Requests\Pasien;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PasienUpdateRequest extends FormRequest
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
            'nik' => ['required', 'digits:16', 'size:16', Rule::unique('pasien', 'nik')->ignore($this->pasien)],
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string'],
            'jenis_asuransi' => ['required', 'string', 'max:255'],
            'dokter_penanggung_jawab_layanan' => ['required', 'numeric'],
            'ruang_rawat_inap' => ['required', 'numeric'],
        ];
    }
}
