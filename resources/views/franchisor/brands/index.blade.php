@extends('layouts.franchisor')
@section('title', 'Brands')
@section('content')

<div class="content">
    <!-- Topbar Start -->
    @include('franchisor.includes.navbar')
    <!-- end Topbar -->

    <div class="container-fluid">
        <div class="float-right mt-3">
            <a href="{{ route('franchisor.brands.create') }}" class="btn btn-success">Add Brand</a>
        </div>
        <div class="filter mt-3 mb-2" style="clear: both">
            <form action="{{ route('franchisor.brands.index') }}">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="form-label">Barnd Name</label>
                            <input type="text" class="form-control" name="filter_name" value="{{ request()->get('filter_name') }}" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="filter_email" value="{{ request()->get('filter_email') }}" placeholder="Email">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="filter_status" id="filter_status">
                                <option value="" selected>Select Status</option>
                                <option @if (request()->get('filter_status') == '1') selected @endif
                                    value="1">Enable</option>
                                <option @if (request()->get('filter_status') == '0') selected @endif
                                value="0">Disable</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3" style="margin-top: 26px;">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt30">Filter</button>
                            <a href="{{ route('franchisor.brands.index') }}" class="btn btn-dark ms-1 mt30">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table-panel table table-bordered table-centered mb-0">
                <thead>
                    <tr>
                        <th><strong>ID</strong></th>
                        <th><strong>Brand</strong></th>
                        <th><strong>Email</strong></th>
                        <td><strong>Status</strong></td>
                        <td class="text-center" style="min-width: 120px"><strong>Action</strong></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <td>#{{ $brand->id }}</td>
                        <td><a href="{{ route('franchisor.brands.show', $brand->id) }}">{{ $brand->brandname }}</a></td>
                        <td>{{ $brand->email }}</td>
                        <td>@if($brand->status) Enable @else Disable @endif</td>
                        <td class="text-center" style="min-width: 120px">
                            <button type="button" class="btn btn-light dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('franchisor.brands.edit', $brand->id ) }}">Edit</a>
                                <!-- <a class="dropdown-item" href="{{ route('franchisor.brands.show', $brand->id) }}">View</a> -->
                                <a class="dropdown-item" onclick="confirmDelete({{ $brand->id }})" >Delete</a>
                            </div>

                            <form id='delete-form{{ $brand->id }}'
                                action='{{ route('franchisor.brands.destroy', $brand->id) }}'
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
        <div class="col-12 bordertop paginate" style="float: right;">
            {{ $brands->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

