@extends('layouts.app')

@section('content')
<x-layouts.content heading="Data Dokter">
    <x-slot name="breadcrumb">
        <x-breadcrumb-item :url="route('dokter.index')">Dokter</x-breadcrumb-item>
        <x-breadcrumb-item>Edit Dokter</x-breadcrumb-item>
    </x-slot>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6 offset-md-3 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Perbaharui data dokter</h4>
                </div>

                <form action="{{ route('dokter.update', $dokter) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Dokter <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{ old('nama') ?? $dokter->nama }}">
                            @error('nama')
                            <strong class="invalid-feedback">
                                {{ $message }}
                            </strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="spesialis">Spesialis <strong class="text-danger">*</strong></label>
                            <input type="text" class="form-control @error('spesialis') is-invalid @enderror"
                                id="spesialis" name="spesialis" value="{{ old('spesialis') ?? $dokter->spesialis }}">
                            @error('spesialis')
                            <strong class="invalid-feedback">
                                {{ $message }}
                            </strong>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary mr-1">Perbaharui</button>
                        <a href="{{ route('dokter.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.content>
@endsection