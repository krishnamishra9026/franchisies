@extends('layouts.admin')
@section('title', 'Earnings')
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
                            <li class="breadcrumb-item active">Earnings</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Earnings</h4>
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
                                {{-- <a href="{{ route('admin.earnings.create') }}" class="btn btn-sm btn-danger"><i class="mdi mdi-plus-circle mr-1"></i>Add New</a> --}}
                            </div>
                            <div class="col-md-12 col-12" id="">
                                <div class="filter mt-3">
                                    <h4>Filter</h4>
                                    <form action="{{ route('admin.earnings.index') }}">
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
                                                <label for="filter_name"></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="title" placeholder="Enter Title"
                                                    name="filter_name" value="{{ @$filter_name }}">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <label for="filter_badge"></label>
                                                <div class="input-group">
                                                    <select class="form-control" name="filter_badge" id="example-select">
                                                        <option value="">Select Package</option>
                                                        @foreach($packages as $package)
                                                        <option @if(@$filter_badge == $package->id ) selected @endif value="{{$package->id}}">{{$package->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <label for="filter_date_to"></label>
                                                <div class="input-group">
                                                    <select class="form-control" name="filter_user_type" id="filter_user_type">
                                                        <option value="" selected>Select User Type</option>
                                                        <option @if (@$filter_user_type == 'Sponsor') selected @endif
                                                        value="Sponsor">Sponsor</option>
                                                        <option @if (@$filter_user_type == 'Creator') selected @endif
                                                        value="Creator">Creator</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col text-end">
                                                <label for="filter_date_to"></label>
                                                <div class="input-group">
                                                    <button class="btn btn-secondary" type="submit"><i class="mdi mdi-filter"></i></button>
                                                    <a href="{{ route('admin.earnings.index') }}" class="btn btn-light" type="submit"><i class="mdi mdi-undo"></i></a>
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
                                            <th>User Name</th>
                                            <th>User Type</th>
                                            <th>Badges</th>
                                            <th>Price</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($earnings as $earning)
                                            <tr>
                                                <td>{{ $earning->id }}</td>
                                                <td>{{ date('d-m-Y', strtotime($earning->created_at)) }}</td>
                                                <td>{{ $earning->username }}</td>
                                                <td>{{ $earning->user_type }}</td>
                                                <td>{{ implode(', ', $earning->badgesData()->toArray()) }}</td>
                                                <td>{{ $earning->amount }}</td>
                                                <td>
                                                    <div class="mb-2">
                                                        {{-- <a href="{{ route('admin.earnings.edit', $earning->id) }}" class="btn btn-sm btn-primary mr-1"><i class="mdi mdi-square-edit-outline"></i></a> --}}
                                                        <button type="button" class="btn btn-sm btn-danger cus-danger" onclick="confirmDelete({{ $earning->id }})"><i class="mdi mdi-trash-can"></i></button>
                                                    </div>

                                                    <form id='delete-form{{ $earning->id }}'
                                                        action='{{ route('admin.earnings.destroy', $earning->id) }}'
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
                                {{ $earnings->appends(request()->query())->links('pagination::bootstrap-4') }}
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
