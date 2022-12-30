@extends('layouts.app')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<x-layouts.content heading="Data Dokter">
    <x-slot name="breadcrumb">
        <x-breadcrumb-item>Data Dokter</x-breadcrumb-item>
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-end">
                    <a href="{{ route('dokter.create') }}" class="btn btn-icon icon-left btn-primary rounded-sm">
                        <i class="fas fa-plus"></i>
                        Dokter
                    </a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-sm table-hover table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Dokter</th>
                                <th scope="col">Spesialis</th>
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
            ajax: "{{ route('dokter.index') }}",
            columns: [
                {
                    data: 'DT_RowIndex', name: 'DT_RowIndex', sortable: false, searchable: false, width: '50px'
                },
                {
                    data: 'nama', name: 'nama'
                },
                {
                    data: 'spesialis', name: 'spesialis'
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