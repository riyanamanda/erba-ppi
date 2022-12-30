@extends('layouts.app')

@section('content')
<x-layouts.content heading="Ruang Rawat Inap">
    <x-slot name="breadcrumb">
        <x-breadcrumb-item :url="route('ruang-rawat-inap.index')">Ruang Rawat Inap</x-breadcrumb-item>
        <x-breadcrumb-item>Edit Ruangan</x-breadcrumb-item>
    </x-slot>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6 offset-md-3 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Perbaharui data ruang rawat inap</h4>
                </div>

                <form action="{{ route('ruang-rawat-inap.update', $ruang_rawat_inap) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Ruangan <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{ old('nama') ?? $ruang_rawat_inap->nama }}">
                            @error('nama')
                            <strong class="invalid-feedback">
                                {{ $message }}
                            </strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas <strong class="text-danger">*</strong></label>
                            <select class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas">
                                <option value="" selected>-- Pilih Kelas --</option>
                                @foreach ($kelas as $item)
                                <option value="{{ $item->value }}" @selected(old('kelas')===$item->value ||
                                    $ruang_rawat_inap->kelas === $item->value)>{{
                                    $item->value }}</option>
                                @endforeach
                            </select>
                            @error('kelas')
                            <strong class="invalid-feedback">
                                {{ $message }}
                            </strong>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary mr-1">Perbaharui</button>
                        <a href="{{ route('ruang-rawat-inap.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.content>
@endsection