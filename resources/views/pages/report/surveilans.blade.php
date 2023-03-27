@php use Carbon\Carbon; @endphp
@extends('layouts.app')

@section('content')
    <x-layouts.content heading="Report">
        <x-slot name="breadcrumb">
            <x-breadcrumb-item>Report</x-breadcrumb-item>
        </x-slot>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Filter Pencarian</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('report.surveilans') }}" method="GET">
                            <div class="row align-items-center justify-content-center">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jenis_laporan">Jenis Laporan</label>
                                        <select id="jenis_laporan" name="jenis_laporan" class="form-control" required>
                                            <option value="" selected>-- pilih laporan --</option>
                                            <option value="semua">
                                                Semua
                                            </option>
                                            <option value="isk">
                                                Infeksi Saluran Kemih (ISK)
                                            </option>
                                            <option
                                                value="phlebitis">
                                                Phlebitis
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="dari_tanggal">Dari Tanggal</label>
                                        <input type="date" class="form-control" id="dari_tanggal" name="dari_tanggal"
                                               max="{{ Carbon::today()->format('Y-m-d') }}" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="sampai_tanggal">Sampai Tanggal</label>
                                        <input type="date" class="form-control" id="sampai_tanggal"
                                               name="sampai_tanggal"
                                               max="{{ Carbon::today()->format('Y-m-d') }}" required>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-icon icon-left btn-primary btn-block">
                                        <i class="fas fa-filter"></i> Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if ($surveilans->count() > 0)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header align-items-center justify-content-between">
                            <h4>Laporan Surveilans</h4>

                            <form action="{{ route('report.export') }}" method="POST">
                                @csrf
                                @foreach ($surveilans as $item)
                                    <input type="text" name="surveilans[]" value="{{ $item->id }}" hidden>
                                @endforeach
                                <input type="text" name="jenis" value="{{ $jenis_surveilans }}" hidden>
                                <input type="text" name="dari"
                                       value="{{ Carbon::parse(request()->get('dari_tanggal'))->isoFormat('D MMMM Y') }}"
                                       hidden>
                                <input type="text" name="sampai"
                                       value="{{ Carbon::parse(request()->get('sampai_tanggal'))->isoFormat('D MMMM Y') }}"
                                       hidden>
                                <button type="submit" class="btn btn-icon icon-left btn-info rounded-0"
                                        formtarget="_blank">
                                    <i class="far fa-file-pdf"></i> Export PDF
                                </button>
                            </form>
                        </div>

                        <div class="card-body">
                            <table class="table table-sm tabel-borderless">
                                <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">No. Rekam Medis</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Jenis Surveilans</th>
                                    <th scope="col">Dokter Penanggung Jawab</th>
                                    <th scope="col">Tanggal Laporan</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($surveilans as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->datapasien->no_rekam_medis }}</td>
                                        <td>{{ $item->datapasien->nama }}</td>
                                        <td>
                                            @if ($item->surveilansable_type == "infeksi_saluran_kemih")
                                                Infeksi Saluran Kemih (ISK)
                                            @elseif($item->surveilansable_type == "phlebitis")
                                                Phlebitis
                                            @endif
                                        </td>
                                        <td>{{ $item->datapasien->dokter->nama }}</td>
                                        <td>{{ $item->created_at->isoFormat('D MMMM Y') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="d-flex flex-column">
                                <span><strong class="text-primary">{{ $jenis_surveilans }}</strong></span>
                                <span style="font-size: 12px;">Periode <strong
                                        class="text-primary">{{ Carbon::parse(request()->get('dari_tanggal'))->isoFormat('D MMMM Y') }}</strong> - <strong
                                        class="text-primary">{{ Carbon::parse(request()->get('sampai_tanggal'))->isoFormat('D MMMM Y') }}</strong>.</span>
                            </div>
                            <div style="font-size: 12px;"><strong
                                    class="text-primary">{{ $surveilans->count() }}</strong> total rekaman.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="empty-state" data-height="400" style="height: 400px;">
                                <div class="empty-state-icon">
                                    <i class="fas fa-folder-open"></i>
                                </div>
                                <h2>Tidak ada data</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-layouts.content>
@endsection
