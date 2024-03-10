@extends('layouts.franchisor')
@section('title', 'Sponsors')
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
                            <li class="breadcrumb-item active">Sponsors</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Sponsors</h4>
                </div>
            </div>
        </div>
        @include('franchisor.sections.flash-message')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 col-12 text-left">
                                <a href="{{ route('franchisor.sponsors.create') }}" class="btn btn-primary"><i class="mdi mdi-plus-circle mr-1"></i>Add New</a>
                            </div>
                                <div class="col-md-12 col-12" id="">
                                    <div class="filter mt-3">
                                        <h4>Filter</h4>
                                        <form action="{{ route('franchisor.sponsors.index') }}">
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
                                                        <input type="text" class="form-control" id="name" placeholder="Enter User Name"
                                                            name="filter_username" value="{{ @$filter_username }}">
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
                                                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone"
                                                            name="filter_phone" value="{{ @$filter_phone }}">
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
                                                    <a href="{{ route('franchisor.sponsors.index') }}" class="btn btn-light"
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
                                            <th>Id</th>
                                            <th>Date Added</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sponsors as $sponsor)
                                            <tr>
                                                <td>{{ $sponsor->id }}</td>
                                                <td>{{ date('d-m-Y', strtotime($sponsor->created_at)) }}</td>
                                                <td>{{ $sponsor->first_name }} {{ $sponsor->last_name }}</td>
                                                <td>{{ $sponsor->username }}</td>
                                                <td>{{ $sponsor->email }}</td>
                                                <td>{{ $sponsor->phone_number }}</td>
                                                <td>@if($sponsor->status) Active @else In-active @endif</td>
                                                <td>
                                                    <div class="mb-2">
                                                        <a href="{{ route('franchisor.sponsors.edit', $sponsor->id) }}" class="btn btn-sm btn-primary mr-1"><i class="mdi mdi-square-edit-outline"></i></a>
                                                        <a href="{{ route('franchisor.sponsors.show', $sponsor->id) }}" class="btn btn-sm btn-primary mr-1"><i class="mdi mdi-eye"></i></a>
                                                        <button type="button" class="btn btn-sm btn-danger cus-danger" onclick="confirmDelete({{ $sponsor->id }})"><i class="mdi mdi-trash-can"></i></button>
                                                    </div>

                                                    <form id='delete-form{{ $sponsor->id }}'
                                                        action='{{ route('franchisor.sponsors.destroy', $sponsor->id) }}'
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
                                {{ $sponsors->appends(request()->query())->links('pagination::bootstrap-4') }}
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
