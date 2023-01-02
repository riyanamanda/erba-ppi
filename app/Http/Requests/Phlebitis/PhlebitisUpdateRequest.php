<?php

namespace App\Http\Requests\Phlebitis;

use Illuminate\Foundation\Http\FormRequest;

class PhlebitisUpdateRequest extends FormRequest
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
            'jenis_pemasangan' => ['required', 'string', 'max:255'],
            'tujuan_pemasangan' => ['required', 'string', 'max:255'],
            'tanggal_pasang' => ['required', 'date'],
            'tanggal_lepas' => ['required', 'date'],
            'keterangan' => ['required', 'string'],
            'lokasi' => ['required', 'string', 'max:255'],
            'lakukan_kebersihan_tangan_sebelum_dan_sesudah_pemasangan' => ['required', 'boolean'],
            'melepas_pemasangan_apabila_ada_keluhan_atau_peradangan' => ['required', 'boolean'],
            'drayssing' => ['required', 'boolean'],
            'melepas_pemasangan_apabila_lebih_dari_72_jam' => ['required', 'boolean'],
            'lakukan_pengecekan_tempat_pemasangan' => ['required', 'boolean'],
        ];
    }
}
