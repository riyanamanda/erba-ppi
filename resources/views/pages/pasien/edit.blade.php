@extends('layouts.app')

@section('content')
<x-layouts.content heading="Edit Data Pasien">
    <x-slot name="breadcrumb">
        <x-breadcrumb-item :url="route('pasien.index')">Pasien</x-breadcrumb-item>
        <x-breadcrumb-item>Edit Pasien</x-breadcrumb-item>
    </x-slot>

    <form class="row" action="{{ route('pasien.update', $pasien) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Data pasien</h4>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Pasien <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama') ?? $pasien->nama }}">
                        @error('nama')
                        <strong class="invalid-feedback">
                            {{ $message }}
                        </strong>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama">NIK (Nomor Induk Kependudukan) <strong
                                        class="text-danger">*</strong></label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                    name="nik" value="{{ old('nik') ?? $pasien->nik }}">
                                @error('nik')
                                <strong class="invalid-feedback">
                                    {{ $message }}
                                </strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir <strong class="text-danger">*</strong></label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') ?? $pasien->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                <strong class="invalid-feedback">
                                    {{ $message }}
                                </strong>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin <strong class="text-danger">*</strong></label>
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input type="radio" name="jenis_kelamin" value="1" class="selectgroup-input"
                                    @checked(old('jenis_kelamin')==="1" || $pasien->jenis_kelamin === "1" )>
                                <span class="selectgroup-button">Laki-laki</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="jenis_kelamin" value="0" class="selectgroup-input"
                                    @checked(old('jenis_kelamin')==="0" || $pasien->jenis_kelamin === "0" )>
                                <span class="selectgroup-button">Perempuan</span>
                            </label>
                        </div>
                        @error('jenis_kelamin')
                        <strong class="text-danger" style="font-size: 11px;">
                            {{ $message }}
                        </strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat <strong class="text-danger">*</strong></label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                            style="height: 70px;">{{ old('alamat') ?? $pasien->alamat }}</textarea>
                        @error('alamat')
                        <strong class="invalid-feedback">
                            {{ $message }}
                        </strong>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Layanan</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="jenis_asuransi">Jenis Asuransi <strong class="text-danger">*</strong></label>
                        <select class="form-control @error('jenis_asuransi') is-invalid @enderror" id="jenis_asuransi"
                            name="jenis_asuransi">
                            <option value="" selected>-- pilih asuransi --</option>
                            @foreach ($asuransi as $item)
                            <option value="{{ $item->value }}" @selected(old('jenis_asuransi')===$item->
                                value || $pasien->jenis_asuransi === $item->value)>{{
                                $item->value }}</option>
                            @endforeach
                        </select>
                        @error('jenis_asuransi')
                        <strong class="invalid-feedback">
                            {{ $message }}
                        </strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dokter_penanggung_jawab_layanan">Dokter Penanggung Jawab Layanan <strong
                                class="text-danger">*</strong></label>
                        <select class="form-control @error('dokter_penanggung_jawab_layanan') is-invalid @enderror"
                            id="dokter_penanggung_jawab_layanan" name="dokter_penanggung_jawab_layanan">
                            <option value="" selected>-- pilih dokter --</option>
                            @foreach ($dokter as $item)
                            <option value="{{ $item->id }}" @selected(old('dokter_penanggung_jawab_layanan')==$item->
                                id || $pasien->dokter_penanggung_jawab_layanan === $item->id)>{{
                                $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('dokter_penanggung_jawab_layanan')
                        <strong class="invalid-feedback">
                            {{ $message }}
                        </strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ruang_rawat_inap">Ruang Rawat Inap <strong class="text-danger">*</strong></label>
                        <select class="form-control @error('ruang_rawat_inap') is-invalid @enderror"
                            id="ruang_rawat_inap" name="ruang_rawat_inap">
                            <option value="" selected>-- pilih ruangan --</option>
                            @foreach ($ruang as $item)
                            <option value="{{ $item->id }}" @selected(old('ruang_rawat_inap')==$item->id ||
                                $pasien->ruang_rawat_inap === $item->id)>{{
                                $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('ruang_rawat_inap')
                        <strong class="invalid-feedback">
                            {{ $message }}
                        </strong>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary mr-1">Perbaharui</button>
                    <a href="{{ route('pasien.index') }}" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </form>
</x-layouts.content>
@endsection