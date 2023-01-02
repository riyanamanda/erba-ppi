@extends('layouts.app')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<x-layouts.content heading="Surveilans">
    <x-slot name="breadcrumb">
        <x-breadcrumb-item>Surveilans</x-breadcrumb-item>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-end">
                    <a href="{{ route('surveilans.create') }}" class="btn btn-icon icon-left btn-primary rounded-sm">
                        <i class="fas fa-plus"></i>
                        Surveilans
                    </a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-sm table-hover table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">No. </th>
                                <th scope="col">No Rekam Medis</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Jenis Surveilans</th>
                                <th scope="col">Dibuat pada</th>
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
            ajax: "{{ route('surveilans.index') }}",
            columns: [
                {
                    data: 'DT_RowIndex', name: 'DT_RowIndex', sortable: false, searchable: false, width: '50px'
                },
                {
                    data: 'no_rekam_medis', name: 'no_rekam_medis'
                },
                {
                    data: 'nama_pasien', name: 'nama_pasien'
                },
                {
                    data: 'jenis_surveilans', name: 'jenis_surveilans'
                },
                {
                    data: 'created_at', name: 'created_at'
                },
                {
                    data: 'aksi', name: 'aksi', sortable: false, searchable: false
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