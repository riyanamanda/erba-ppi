@extends('layouts.app')

@section('content')
<x-layouts.content heading="Dashboard">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="section-title mb-5">Ruang Rawat Inap</div>

                    <div class="row">
                        @foreach ($ruangan as $item)
                        @php
                        if (! is_null($item->pasien)) {
                        $pasien = $item->pasien->count();
                        }else {
                        $pasien = 0;
                        }
                        @endphp
                        <div class="col-4 mb-4">
                            <button type="button" class="btn btn-icon btn-block icon-left
                            @if ($pasien === 0)
                                btn-primary
                            @elseif ($pasien >= 1 && $pasien <= 4)
                                btn-warning
                            @elseif ($pasien >= 5)
                                btn-danger
                            @endif
                            ">
                                <i class="fas fa-procedures"></i>
                                <strong>{{ $item->nama }}</strong>
                                <span class="badge badge-transparent p-3">
                                    {{ $pasien }}
                                </span>
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="section-title mb-5">Jenis Infeksi</div>

                    <div class="row">
                        @foreach ($surveilans as $key => $item)
                        <div class="col-6 mb-4">
                            <button type="button" class="btn btn-icon btn-block icon-left
                            @if ($item->count() === 0)
                                btn-primary
                            @elseif ($item->count() >= 1 && $item->count() <= 4)
                                btn-warning
                            @elseif ($item->count() >= 5)
                                btn-danger
                            @endif
                            ">
                                <i class="fas fa-stethoscope"></i>
                                <strong>
                                    @if ($key === 'infeksi_saluran_kemih')
                                    Infeksi Saluran Kemih (ISK)
                                    @elseif ($key === 'phlebitis')
                                    Phlebitis
                                    @else
                                    Unknown
                                    @endif
                                </strong>
                                <span class="badge badge-transparent p-3">
                                    {{ $item->count() }}
                                </span>
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.content>
@endsection