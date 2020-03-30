@extends('layouts/master')

@section('title', 'Employee List')

@section('extended css')
<link rel="stylesheet" href="{{ asset('admin-template/vendor/datatables/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employee</h1>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
                <div class="dropdown no-arrow">
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-employee" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Employee ID</th>
                                <th>Division/Project</th>
                                <th>Position</th>
                                <th>Date Hired</th>
                                <th>Status</th>
                                <th>Birthday</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($EmployeeDetail as $EmployeeDetails)
                            <tr>
                                
                                <td>{{ strtoupper($EmployeeDetails->lastname).', '.strtoupper($EmployeeDetails->firstname).' '.strtoupper($EmployeeDetails->middlename) }}
                                </td>
                                <td>{{ $EmployeeDetails->employee_id }}</td>
                                
                                <td>{{ strtoupper($EmployeeDetails->division) }}</td>
                                <td>{{ strtoupper($EmployeeDetails->position) }}</td>
                                <td>{{ date('F d, Y', strtotime($EmployeeDetails->date_hired)) }}</td>
                                <td>{{ strtoupper($EmployeeDetails->status) }}</td>
                                <td>{{ date('F d, Y', strtotime($EmployeeDetails->birthday)) }}</td>
                                <td>
                                    <a href="/employee/view-employee/{{ $EmployeeDetails->id }}"
                                    class="btn btn-success btn-sm btn-circle" title="View Record"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm btn-circle" class="btn btn-secondary" title="Remove Duplicate" data-toggle="modal" data-target="#removeModal"><i class="fas fa-copy"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeModalLabel">Remove Duplicate Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want delete this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="/employee/remove-duplicate/{{ $EmployeeDetails->id }}" method="POST">
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@if (session('success'))
<div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="3000"
    style="position: absolute; top: 75px; right: 0; width: 250px">
    <div class="toast-header">
        <strong class="mr-auto">GoldridgeCDC</strong>
        <small>Now</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{ session('success') }}
    </div>
</div>
@endif
@endsection

@section('extended js')
<!-- Page level plugins -->
<script src="{{ asset('admin-template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('admin-template/js/demo/datatables-demo.js') }}"></script>

<!-- Tooltips -->
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>

<script type="text/javascript">
    $('.toast').toast('show')
</script>
@endsection
