@extends('layouts.app')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<x-layouts.content heading="Data Pasien">
    <x-slot name="breadcrumb">
        <x-breadcrumb-item>Data Pasien</x-breadcrumb-item>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-end">
                    <a href="{{ route('pasien.create') }}" class="btn btn-icon icon-left btn-primary rounded-sm">
                        <i class="fas fa-plus"></i>
                        Pasien
                    </a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-sm table-hover table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">No Rekam Medis</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Jenis Asuransi</th>
                                <th scope="col">Dokter Penanggung Jawab</th>
                                <th scope="col">Ruang Rawat</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts.content>

<!-- Delete Modal -->
<x-modal-delete id="modal-delete" />
<!-- End Delete Modal -->
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(function() {
        $('#datatable').DataTable({
            processing: true,
            serverside: true,
            ajax: "{{ route('pasien.index') }}",
            columns: [
                {
                    data: "no_rekam_medis", name: "no_rekam_medis"
                },
                {
                    data: "nama", name: "nama"
                },
                {
                    data: "nik", name: "nik"
                },
                {
                    data: "jenis_kelamin", name: "jenis_kelamin"
                },
                {
                    data: "tanggal_lahir", name: "tanggal_lahir"
                },
                {
                    data: "alamat", name: "alamat"
                },
                {
                    data: "jenis_asuransi", name: "jenis_asuransi"
                },
                {
                    data: "dokter_penanggung_jawab_layanan", name: "dokter_penanggung_jawab_layanan"
                },
                {
                    data: "ruang_rawat_inap", name: "ruang_rawat_inap"
                },
                {
                    data: "aksi", name: "aksi"
                }
            ]
        });
        $('#modal-delete').on('show.bs.modal', (event) => {
            const url = $(event.relatedTarget).data('url');
            const name = $(event.relatedTarget).data('title');
            $('#form-delete').attr('action', url);
            $('#text-value').text(name);
        })
    });
</script>
@endpush