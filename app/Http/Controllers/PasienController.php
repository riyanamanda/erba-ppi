<?php

namespace App\Http\Controllers;

use App\Enums\JenisAsuransi;
use App\Http\Requests\Pasien\PasienStoreRequest;
use App\Http\Requests\Pasien\PasienUpdateRequest;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\RuangRawatInap;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pasien = Pasien::query()
                ->with('dokter', 'ruang')
                ->latest();

            return DataTables::of($pasien)
                ->editColumn('jenis_kelamin', function ($data) {
                    return $data->jenis_kelamin == 0 ? 'Perempuan' : 'Laki-laki';
                })
                ->editColumn('tanggal_lahir', function ($data) {
                    return Carbon::parse($data->tanggal_lahir)->isoFormat('D MMMM Y');
                })
                ->editColumn('dokter_penanggung_jawab_layanan', function ($data) {
                    return $data->dokter->nama;
                })
                ->editColumn('ruang_rawat_inap', function ($data) {
                    return $data->ruang->nama;
                })
                ->addColumn('aksi', function ($data) {
                    $button = '
                        <div class="d-flex align-itemc-center justify-content-end">
                            <a href="'.route('pasien.edit', $data).'" class="btn btn-sm btn-info btn-icon icon-left mr-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="#"
                                class="btn btn-sm btn-danger btn-icon icon-left mr-2"
                                data-toggle="modal"
                                data-target="#modal-delete"
                                data-title="'.$data->nama.'"
                                data-url="'.route('pasien.destroy', $data).'">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                    ';

                    return $button;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('pages.pasien.index');
    }

    public function create()
    {
        $asuransi = JenisAsuransi::cases();
        $dokter = Dokter::all();
        $ruang = RuangRawatInap::all();

        return view('pages.pasien.create', compact('asuransi', 'dokter', 'ruang'));
    }

    public function store(PasienStoreRequest $request)
    {
        Pasien::create([
            'no_rekam_medis' => now()->day.mt_rand(00001, 99999),
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'jenis_asuransi' => $request->jenis_asuransi,
            'dokter_penanggung_jawab_layanan' => $request->dokter_penanggung_jawab_layanan,
            'ruang_rawat_inap' => $request->ruang_rawat_inap,
        ]);

        return to_route('pasien.index')->withToastSuccess('Data berhasil disimpan');
    }

    public function edit(Pasien $pasien)
    {
        $asuransi = JenisAsuransi::cases();
        $dokter = Dokter::all();
        $ruang = RuangRawatInap::all();

        return view('pages.pasien.edit', compact('pasien', 'asuransi', 'dokter', 'ruang'));
    }

    public function update(PasienUpdateRequest $request, Pasien $pasien)
    {
        $pasien->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'jenis_asuransi' => $request->jenis_asuransi,
            'dokter_penanggung_jawab_layanan' => $request->dokter_penanggung_jawab_layanan,
            'ruang_rawat_inap' => $request->ruang_rawat_inap,
        ]);

        return to_route('pasien.index')->withToastSuccess('Data berhasil diperbaharui');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return to_route('pasien.index')->withToastSuccess('Data berhasil dihapus');
    }
}
