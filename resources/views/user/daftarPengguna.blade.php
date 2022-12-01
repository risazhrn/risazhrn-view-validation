@extends('layouts.extendsLayout')
@section('header')
    {{ __('Daftar User') }}
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable({
                ajax: '{{ route('getAllUser') }}',
                serverSide: false,
                processing: true,
                deferRender: true,
                type: 'GET',
                destroy: true,
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'fullname', name: 'fullname'},
                    { data: 'email', name: 'email'},
                    { data: 'address', name: 'address'},
                    { data: 'birthdate', name: 'birthdate'},
                    { data: 'phoneNumber', name: 'phoneNumber'},
                    { data: 'action', name: 'action', orderable: false, searchable: false},
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
                <th>Fullname</th>
                <th>Email</th>
                <th>Address</th>
                <th>Birthdate</th>
                <th>Phone Number</th>
                <th>Opsi</th>
            </tr>
        </thead>
    </table>
@endsection
