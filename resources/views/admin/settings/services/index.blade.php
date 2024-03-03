@extends('layouts.admin')
@section('title', 'Services')
@section('head')
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Services</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Services</h4>
                </div>
            </div>
        </div>
        @include('admin.sections.flash-message')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-2 col-12 text-left">
                                <a href="{{ route('admin.services-setting.create') }}" class="btn btn-sm btn-danger"><i class="mdi mdi-plus-circle mr-1"></i>Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Sort Order</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr>
                                                <td>{{ $service->id }}</td>
                                                <td>{{ $service->title }}</td>
                                                <td>{{ @$service->categoryData->name }}</td>
                                                <td>{{ @$service->sort_order }}</td>
                                                <td>
                                                    <div class="mb-2">
                                                        <a href="{{ route('admin.services-setting.edit', $service->id) }}" class="btn btn-sm btn-primary mr-1"><i class="mdi mdi-square-edit-outline"></i></a>
                                                        <button type="button" class="btn btn-sm btn-danger cus-danger" onclick="confirmDelete({{ $service->id }})"><i class="mdi mdi-trash-can"></i></button>
                                                    </div>

                                                    <form id='delete-form{{ $service->id }}'
                                                        action='{{ route('admin.services-setting.destroy', $service->id) }}'
                                                        method='POST'>
                                                        <input type='hidden' name='_token'
                                                            value='{{ csrf_token() }}'>
                                                        <input type='hidden' name='_method' value='DELETE'>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 bordertop">
                                {{ $services->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Datatables js -->
    <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/responsive.bootstrap4.min.js') }}"></script>


    <!-- Datatable Init js -->
    <script>
        $(function() {
            $("#basic-datatable").DataTable({
                "paging": false,
                "pageLength": 20,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                "order": [
                    [0, 'desc']
                ]
            });
        });
    </script>


    <script type="text/javascript">
        function confirmDelete(no) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form' + no).submit();
                }
            })
        };
    </script>
@endpush
