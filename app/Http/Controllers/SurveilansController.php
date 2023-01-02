<?php

namespace App\Http\Controllers;

use App\Models\InfeksiSaluranKemih;
use App\Models\Pasien;
use App\Models\Surveilans;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SurveilansController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $surveilans = Surveilans::latest();

            return DataTables::of($surveilans)
                ->addIndexColumn()
                ->addColumn('no_rekam_medis', function ($data) {
                    return $data->datapasien->no_rekam_medis;
                })
                ->addColumn('nama_pasien', function ($data) {
                    return $data->datapasien->nama;
                })
                ->addColumn('jenis_surveilans', function ($data) {
                    if ($data->surveilansable instanceof InfeksiSaluranKemih) {
                        $jenis = 'Infeksi Saluran Kemih (ISK)';
                    }

                    return $jenis;
                })
                ->addColumn('aksi', function ($data) {
                    $button = '
                        <div class="d-flex align-itemc-center justify-content-end">
                            <a href="#" class="btn btn-sm btn-info btn-icon icon-left mr-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="#"
                                class="btn btn-sm btn-danger btn-icon icon-left mr-2"
                                data-toggle="modal"
                                data-target="#modal-delete"
                                data-title="' . $data->datapasien->nama . '"
                                data-url="#">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                    ';

                    return $button;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('pages.surveilans.index');
    }

    public function create()
    {
        $pasien = Pasien::all();

        return view('pages.surveilans.create', compact('pasien'));
    }

    public function surveilans(Request $request)
    {
        $response = '';
        if ($request->param === 'isk') {
            $response = [
                'title' => 'isk',
                'url' => route('infeksi-saluran-kemih.store'),
                'render' => view('components.form.isk-form')->render()
            ];
        } elseif ($request->param === 'phlebitis') {
            $response = [
                'title' => 'phlebitis',
                'url' => '#',
                'render' => view('components.form.phlebitis-form')->render()
            ];
        }

        return $response;
    }
}
