<?php

namespace App\Http\Requests\InfeksiSaluranKemih;

use Illuminate\Foundation\Http\FormRequest;

class InfeksiSaluranKemihStoreRequest extends FormRequest
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
            'pasien' => ['required', 'numeric'],
            'jenis_pemasangan' => ['required', 'string'],
            'pemeriksaan' => ['required', 'string'],
            'tanggal_pemeriksaan' => ['required', 'string'],
            'keterangan' => ['required', 'string'],
            'tanggal_pasang' => ['required', 'string'],
            'pemasangan_dc_sesuai_indikasi' => ['required', 'boolean'],
            'pemasangan_menggunakan_alat_steril' => ['required', 'boolean'],
            'melakukan_hand_hyglene' => ['required', 'boolean'],
            'segera_dilepas_jika_tidak_indikasi' => ['required', 'boolean'],
            'fiksasi_kateter_dengan_plester' => ['required', 'boolean'],
            'pengisian_balon_sesuai_indikasi' => ['required', 'boolean'],
            'adp_tepat' => ['required', 'boolean'],
            'urine_bag_menggantung' => ['required', 'boolean'],
        ];
    }
}
