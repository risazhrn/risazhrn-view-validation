@extends('layouts.extendsLayout')
@section('header')
    {{ __('Tambah Koleksi') }}
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable({
                ajax: '{{ route('getAllCollection') }}',
                serverSide: false,
                processing: true,
                deferRender: true,
                type: 'GET',
                destroy: true,
                columns: [{
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endpush

@section('content')
    <table class="table table-striped table-hover" id="datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Opsi</th>
            </tr>
        </thead>
    </table>
@endsection
