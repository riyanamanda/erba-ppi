<?php

namespace App\Http\Controllers;

use App\Models\Surveilans;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function surveilans(Request $request)
    {
        $jenis_laporan = $request->get('jenis_laporan');
        $dari = $request->get('dari_tanggal');
        $sampai = $request->get('sampai_tanggal');

        $surveilans = collect(null);

        if ($jenis_laporan === 'isk') {
            $jenis_surveilans = 'Infeksi Saluran Kemih (ISK)';
            $filter = 'infeksi_saluran_kemih';
        } elseif ($jenis_laporan === 'phlebitis') {
            $jenis_surveilans = 'Phlebitis';
            $filter = 'phlebitis';
        } else {
            $jenis_surveilans = 'Semua Jenis';
            $filter = '';
        }

        if (! is_null($jenis_laporan) && ! is_null($dari) && ! is_null($sampai)) {
            if ($filter) {
                $surveilans = Surveilans::query()
                    ->where('surveilansable_type', $filter)
                    ->whereBetween('created_at', [$dari, $sampai])
                    ->get();
            } else {
                $surveilans = Surveilans::query()
                    ->whereBetween('created_at', [$dari, $sampai])
                    ->get();
            }
        }

        return view('pages.report.surveilans', compact('surveilans', 'jenis_surveilans'));
    }

    public function export_pdf(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $jenis_surveilans = $request->jenis;
        $surveilans = Surveilans::whereIn('id', $request->surveilans)->get();

        $pdf = Pdf::loadView('components.export-pdf', compact('surveilans', 'jenis_surveilans', 'dari', 'sampai'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('surveilans.pdf');
    }
}
