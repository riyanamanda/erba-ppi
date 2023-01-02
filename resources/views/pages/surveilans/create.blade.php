@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<x-layouts.content heading="Surveilans">
    <x-slot name="breadcrumb">
        <x-breadcrumb-item :url="route('surveilans.index')">Surveilans</x-breadcrumb-item>
        <x-breadcrumb-item>Tambah Surveilans</x-breadcrumb-item>
    </x-slot>

    <form id="form-action" method="POST">
        @csrf

        <div class="row">
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah surveilans</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="pasien">Nama Pasien <strong class="text-danger">*</strong></label>
                            <select class="form-control @error('pasien') is-invalid @enderror select2" id="pasien"
                                name="pasien">
                                <option value="" selected>-- pilih pasien --</option>
                                @foreach ($pasien as $item)
                                <option value="{{ $item->id }}">{{ $item->no_rekam_medis . ' - ' . $item->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('pasien')
                            <strong class="invalid-feedback">
                                {{ $message }}
                            </strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jenis_surveilans">Jenis Surveilans <strong
                                    class="text-danger">*</strong></label>
                            <select class="form-control @error('jenis_surveilans') is-invalid @enderror"
                                id="jenis_surveilans" name="jenis_surveilans">
                                <option value="" selected>-- Pilih form surveilans --</option>
                                <option value="isk">Infeksi Saluran Kemih (ISK)</option>
                                <option value="phlebitis">Phlebitis</option>
                            </select>
                            @error('jenis_surveilans')
                            <strong class="invalid-feedback">
                                {{ $message }}
                            </strong>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

            <div id="form-surveilans" class="col-12 col-md-9"></div>
        </div>
    </form>
</x-layouts.content>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(function(){
        $('select2').select2({
            theme: 'bootstrap4'
        });

        $('#jenis_surveilans').change(event => {
            get_form(event.target.value);
        })

        const get_form = (param) => {
            $.ajax({
                url: '{{ route('get.form') }}',
                type: 'GET',
                data: {
                    param: param,
                },
                success: data => {
                    if (data.title == 'isk') {
                        $('#form-action').attr('action', data.url);
                        $('#form-surveilans').html(data.render);
                    }else if(data.title == 'phlebitis'){
                        $('#form-action').attr('action', data.url);
                        $('#form-surveilans').html(data.render);
                    }
                }
            });
        }
    })
</script>
@endpush