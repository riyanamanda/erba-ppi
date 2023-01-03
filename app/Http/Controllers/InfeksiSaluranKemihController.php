<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfeksiSaluranKemih\InfeksiSaluranKemihStoreRequest;
use App\Http\Requests\InfeksiSaluranKemih\InfeksiSaluranKemihUpdateRequest;
use App\Models\InfeksiSaluranKemih;
use App\Models\Surveilans;
use Illuminate\Support\Facades\DB;

class InfeksiSaluranKemihController extends Controller
{
    public function store(InfeksiSaluranKemihStoreRequest $request)
    {
        DB::transaction(function () use ($request) {
            $isk = InfeksiSaluranKemih::create([
                'jenis_pemasangan' => $request->jenis_pemasangan,
                'pemeriksaan' => $request->pemeriksaan,
                'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan,
                'keterangan' => $request->keterangan,
                'tanggal_pasang' => $request->tanggal_pasang,
                'pemasangan_dc_sesuai_indikasi' => $request->pemasangan_dc_sesuai_indikasi,
                'pemasangan_menggunakan_alat_steril' => $request->pemasangan_menggunakan_alat_steril,
                'melakukan_hand_hyglene' => $request->melakukan_hand_hyglene,
                'segera_dilepas_jika_tidak_indikasi' => $request->segera_dilepas_jika_tidak_indikasi,
                'fiksasi_kateter_dengan_plester' => $request->fiksasi_kateter_dengan_plester,
                'pengisian_balon_sesuai_indikasi' => $request->pengisian_balon_sesuai_indikasi,
                'adp_tepat' => $request->adp_tepat,
                'urine_bag_menggantung' => $request->urine_bag_menggantung,
            ]);

            Surveilans::create([
                'pasien' => $request->pasien,
                'surveilansable_id' => $isk->id,
                'surveilansable_type' => 'infeksi_saluran_kemih',
            ]);
        });

        return to_route('surveilans.index')->withToastSuccess('Data berhasil disimpan');
    }

    public function update(InfeksiSaluranKemihUpdateRequest $request, InfeksiSaluranKemih $infeksi_saluran_kemih)
    {
        $infeksi_saluran_kemih->update([
            'jenis_pemasangan' => $request->jenis_pemasangan,
            'pemeriksaan' => $request->pemeriksaan,
            'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan,
            'keterangan' => $request->keterangan,
            'tanggal_pasang' => $request->tanggal_pasang,
            'pemasangan_dc_sesuai_indikasi' => $request->pemasangan_dc_sesuai_indikasi,
            'pemasangan_menggunakan_alat_steril' => $request->pemasangan_menggunakan_alat_steril,
            'melakukan_hand_hyglene' => $request->melakukan_hand_hyglene,
            'segera_dilepas_jika_tidak_indikasi' => $request->segera_dilepas_jika_tidak_indikasi,
            'fiksasi_kateter_dengan_plester' => $request->fiksasi_kateter_dengan_plester,
            'pengisian_balon_sesuai_indikasi' => $request->pengisian_balon_sesuai_indikasi,
            'adp_tepat' => $request->adp_tepat,
            'urine_bag_menggantung' => $request->urine_bag_menggantung,
        ]);

        return to_route('surveilans.index')->withToastSuccess('Data berhasil diperbaharui');
    }
}
