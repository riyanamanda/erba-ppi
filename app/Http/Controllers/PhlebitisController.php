<?php

namespace App\Http\Controllers;

use App\Http\Requests\Phlebitis\PhlebitisStoreRequest;
use App\Http\Requests\Phlebitis\PhlebitisUpdateRequest;
use App\Models\Phlebitis;
use App\Models\Surveilans;
use Illuminate\Support\Facades\DB;

class PhlebitisController extends Controller
{
    public function store(PhlebitisStoreRequest $request)
    {
        DB::transaction(function () use ($request) {
            $phlebitis = Phlebitis::create([
                'jenis_pemasangan' => $request->jenis_pemasangan,
                'tujuan_pemasangan' => $request->tujuan_pemasangan,
                'tanggal_pasang' => $request->tanggal_pasang,
                'tanggal_lepas' => $request->tanggal_lepas,
                'keterangan' => $request->keterangan,
                'lokasi' => $request->lokasi,
                'lakukan_kebersihan_tangan_sebelum_dan_sesudah_pemasangan' => $request->lakukan_kebersihan_tangan_sebelum_dan_sesudah_pemasangan,
                'melepas_pemasangan_apabila_ada_keluhan_atau_peradangan' => $request->melepas_pemasangan_apabila_ada_keluhan_atau_peradangan,
                'drayssing' => $request->drayssing,
                'melepas_pemasangan_apabila_lebih_dari_72_jam' => $request->melepas_pemasangan_apabila_lebih_dari_72_jam,
                'lakukan_pengecekan_tempat_pemasangan' => $request->lakukan_pengecekan_tempat_pemasangan,
            ]);

            Surveilans::create([
                'pasien' => $request->pasien,
                'surveilansable_id' => $phlebitis->id,
                'surveilansable_type' => 'phlebitis',
            ]);
        });

        return to_route('surveilans.index')->withToastSuccess('Data berhasil disimpan');
    }

    public function update(PhlebitisUpdateRequest $request, Phlebitis $phlebitis)
    {
        $phlebitis->update([
            'jenis_pemasangan' => $request->jenis_pemasangan,
            'tujuan_pemasangan' => $request->tujuan_pemasangan,
            'tanggal_pasang' => $request->tanggal_pasang,
            'tanggal_lepas' => $request->tanggal_lepas,
            'keterangan' => $request->keterangan,
            'lokasi' => $request->lokasi,
            'lakukan_kebersihan_tangan_sebelum_dan_sesudah_pemasangan' => $request->lakukan_kebersihan_tangan_sebelum_dan_sesudah_pemasangan,
            'melepas_pemasangan_apabila_ada_keluhan_atau_peradangan' => $request->melepas_pemasangan_apabila_ada_keluhan_atau_peradangan,
            'drayssing' => $request->drayssing,
            'melepas_pemasangan_apabila_lebih_dari_72_jam' => $request->melepas_pemasangan_apabila_lebih_dari_72_jam,
            'lakukan_pengecekan_tempat_pemasangan' => $request->lakukan_pengecekan_tempat_pemasangan,
        ]);

        return to_route('surveilans.index')->withToastSuccess('Data berhasil diperbaharui');
    }
}
