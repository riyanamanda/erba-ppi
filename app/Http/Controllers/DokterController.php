<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dokter\DokterStoreRequest;
use App\Http\Requests\Dokter\DokterUpdateRequest;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DokterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dokter = Dokter::latest();

            return DataTables::of($dokter)
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $button = '
                        <div class="d-flex align-itemc-center justify-content-end">
                            <a href="' . route('dokter.edit', $data) . '" class="btn btn-sm btn-info btn-icon icon-left mr-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="#"
                                class="btn btn-sm btn-danger btn-icon icon-left mr-2"
                                data-toggle="modal"
                                data-target="#modal-delete"
                                data-title="' . $data->nama . '"
                                data-url="' . route('dokter.destroy', $data) . '">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                    ';

                    return $button;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('pages.dokter.index');
    }

    public function create()
    {
        return view('pages.dokter.create');
    }

    public function store(DokterStoreRequest $request)
    {
        Dokter::create([
            'nama' => $request->nama,
            'spesialis' => $request->spesialis
        ]);

        return to_route('dokter.index')->withToastSuccess('Data berhasil disimpan');
    }

    public function show($id)
    {
        //
    }

    public function edit(Dokter $dokter)
    {
        return view('pages.dokter.edit', compact('dokter'));
    }

    public function update(DokterUpdateRequest $request, Dokter $dokter)
    {
        $dokter->update([
            'nama' => $request->nama,
            'spesialis' => $request->spesialis
        ]);

        return to_route('dokter.index')->withToastSuccess('Data berhasil diperbaharui');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        return to_route('dokter.index')->withToastSuccess('Data berhasil dihapus');
    }
}
