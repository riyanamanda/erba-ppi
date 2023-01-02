<?php

namespace App\Http\Controllers;

use App\Models\InfeksiSaluranKemih;
use App\Models\Pasien;
use App\Models\Phlebitis;
use App\Models\Surveilans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                    } elseif ($data->surveilansable instanceof Phlebitis) {
                        $jenis = 'Phlebitis';
                    } else {
                        $jenis = 'unknown';
                    }

                    return $jenis;
                })
                ->editColumn('created_at', function ($data) {
                    return Carbon::parse($data->created_at)->isoFormat('D MMMM Y');
                })
                ->addColumn('aksi', function ($data) {
                    $button = '
                        <div class="d-flex align-itemc-center justify-content-end">
                            <a href="'.route('surveilans.edit', $data).'" class="btn btn-sm btn-info btn-icon icon-left mr-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="#"
                                class="btn btn-sm btn-danger btn-icon icon-left mr-2"
                                data-toggle="modal"
                                data-target="#modal-delete"
                                data-title="'.$data->datapasien->nama.'"
                                data-url="'.route('surveilans.destroy', $data).'">
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

    public function edit(Surveilans $surveilans)
    {
        $type = 'unknown';
        $url = '#';

        if ($surveilans->surveilansable instanceof InfeksiSaluranKemih) {
            $type = 'ISK';
            $url = route('infeksi-saluran-kemih.update', $surveilans->surveilansable_id);
        }
        if ($surveilans->surveilansable instanceof Phlebitis) {
            $type = 'phlebitis';
            $url = route('phlebitis.update', $surveilans->surveilansable_id);
        }

        return view('pages.surveilans.edit', compact('surveilans', 'type', 'url'));
    }

    public function destroy(Surveilans $surveilans)
    {
        DB::transaction(function () use ($surveilans) {
            $surveilans->surveilansable()->delete();
            $surveilans->delete();
        });

        return to_route('surveilans.index')->withToastSuccess('Data berhasil dihapus');
    }

    public function surveilans(Request $request)
    {
        $response = '';
        if ($request->param === 'isk') {
            $response = [
                'title' => 'isk',
                'url' => route('infeksi-saluran-kemih.store'),
                'render' => view('components.form.isk.create')->render(),
            ];
        } elseif ($request->param === 'phlebitis') {
            $response = [
                'title' => 'phlebitis',
                'url' => route('phlebitis.store'),
                'render' => view('components.form.phlebitis.create')->render(),
            ];
        }

        return $response;
    }
}
