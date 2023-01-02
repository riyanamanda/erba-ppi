<?php

namespace App\Http\Controllers;

use App\Enums\KelasRuangan;
use App\Http\Requests\Ruang\RuangRawatInapStoreRequest;
use App\Http\Requests\Ruang\RuangRawatInapUpdateRequest;
use App\Models\RuangRawatInap;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RuangRawatInapController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $ruang_rawat_inap = RuangRawatInap::latest();

            return DataTables::of($ruang_rawat_inap)
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $button = '
                        <div class="d-flex align-itemc-center justify-content-end">
                            <a href="' . route('ruang-rawat-inap.edit', $data) . '" class="btn btn-sm btn-info btn-icon icon-left mr-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="#"
                                class="btn btn-sm btn-danger btn-icon icon-left mr-2"
                                data-toggle="modal"
                                data-target="#modal-delete"
                                data-title="' . $data->nama . '"
                                data-url="' . route('ruang-rawat-inap.destroy', $data) . '">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                    ';

                    return $button;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('pages.ruang-rawat-inap.index');
    }

    public function create()
    {
        $kelas = KelasRuangan::cases();

        return view('pages.ruang-rawat-inap.create', compact('kelas'));
    }

    public function store(RuangRawatInapStoreRequest $request)
    {
        RuangRawatInap::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);

        return to_route('ruang-rawat-inap.index')->withToastSuccess('Data berhasil disimpan');
    }

    public function show($id)
    {
        //
    }

    public function edit(RuangRawatInap $ruang_rawat_inap)
    {
        $kelas = KelasRuangan::cases();

        return view('pages.ruang-rawat-inap.edit', compact('ruang_rawat_inap', 'kelas'));
    }

    public function update(RuangRawatInapUpdateRequest $request, RuangRawatInap $ruang_rawat_inap)
    {
        $ruang_rawat_inap->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);

        return to_route('ruang-rawat-inap.index')->withToastSuccess('Data berhasil diperbaharui');
    }

    public function destroy(RuangRawatInap $ruang_rawat_inap)
    {
        $ruang_rawat_inap->delete();

        return to_route('ruang-rawat-inap.index')->withToastSuccess('Data berhasil dihapus');
    }
}
