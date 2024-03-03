@extends('layouts.admin')
@section('title', 'Enquiries')
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
                            <li class="breadcrumb-item active">Enquiries</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Enquiries</h4>
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
                                <a href="{{ route('admin.enquiries.create') }}" class="btn btn-sm btn-danger"><i class="mdi mdi-plus-circle mr-1"></i>Add New</a>
                            </div>

                            <div class="col-md-12 col-12" id="">
                                    <div class="filter mt-3">
                                        <h4>Filter</h4>
                                        <form action="{{ route('admin.enquiries.index') }}">
                                            <div class="form-row">


                                                <div class="col">
                                                    <label for="filter_date_from">Date from</label>
                                                    <div class="input-group">
                                                        <input type="date" id="filter_date_from"  name="filter_date_from" value="{{ @$filter_date_from}}" class="form-control" placeholder="Select Date">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <label for="filter_date_to">Date to</label>
                                                    <div class="input-group">
                                                        <input type="date" id="filter_date_to" name="filter_date_to" value="{{ @$filter_date_to}}" class="form-control" placeholder="Select Date">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <label for="filter_date_to"></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                                            name="filter_name" value="{{ @$filter_name }}">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <label for="filter_date_to"></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="email" placeholder="Enter Email"
                                                            name="filter_email" value="{{ @$filter_email }}">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <label for="filter_date_to"></label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="filter_status" id="filter_status">
                                                            <option value="" selected>Select Status</option>
                                                            <option @if (@$filter_status == '1') selected @endif
                                                                value="1">Active</option>
                                                            <option @if (@$filter_status == '0') selected @endif
                                                                value="0">In-active</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col text-end">
                                                    <label for="filter_date_to"></label>
                                                    <div class="input-group">
                                                    <button class="btn btn-secondary" type="submit"><i
                                                            class="mdi mdi-filter"></i></button>
                                                    <a href="{{ route('admin.enquiries.index') }}" class="btn btn-light"
                                                        type="submit"><i class="mdi mdi-undo"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enquiries as $enquiry)
                                            <tr>
                                                <td>{{ $enquiry->id }}</td>
                                                <td>{{ date('d-m-Y', strtotime($enquiry->created_at)) }}</td>
                                                <td>{{ $enquiry->name }}</td>
                                                <td>{{ $enquiry->email }}</td>
                                                <td>@if($enquiry->status) Active @else In-active @endif</td>
                                                <td>
                                                    <div class="mb-2">
                                                        <a href="{{ route('admin.enquiries.edit', $enquiry->id) }}" class="btn btn-sm btn-primary mr-1"><i class="mdi mdi-eye"></i></a>
                                                        <button type="button" class="btn btn-sm btn-danger cus-danger" onclick="confirmDelete({{ $enquiry->id }})"><i class="mdi mdi-trash-can"></i></button>
                                                    </div>

                                                    <form id='delete-form{{ $enquiry->id }}'
                                                        action='{{ route('admin.enquiries.destroy', $enquiry->id) }}'
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
                                {{ $enquiries->appends(request()->query())->links('pagination::bootstrap-4') }}
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
