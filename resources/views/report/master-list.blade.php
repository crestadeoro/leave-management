@extends('layouts/master')

@section('title', 'Employee Report')

@section('extended css')
<link rel="stylesheet" href="{{ asset('admin-template/vendor/datatables/dataTables.bootstrap4.min.css') }}">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
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
                                <th>SSS</th>
                                <th>Philhealth</th>
                                <th>HDMF</th>
                                <th>TIN</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Employee as $Employees)
                            <tr>
                                
                                <td>{{ strtoupper($Employees->lastname).', '.strtoupper($Employees->firstname).' '.strtoupper($Employees->middlename) }}
                                </td>
                                <td>{{ $Employees->employee_id }}</td>
                                
                                <td>{{ strtoupper($Employees->division) }}</td>
                                <td>{{ strtoupper($Employees->position) }}</td>
                                <td>{{ date('F d, Y', strtotime($Employees->date_hired)) }}</td>
                                <td>{{ strtoupper($Employees->status) }}</td>
                                <td>{{ date('F d, Y', strtotime($Employees->birthday)) }}</td>
                                <td>{{ strtoupper($Employees->sss) }}</td>
                                <td>{{ strtoupper($Employees->philhealth) }}</td>
                                <td>{{ strtoupper($Employees->hdmf) }}</td>
                                <td>{{ strtoupper($Employees->tin) }}</td>
                                <td>{{ strtoupper($Employees->address) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extended js')
<!-- Page level plugins -->
<script src="{{ asset('admin-template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('admin-template/js/demo/datatables-demo.js') }}"></script>

<!-- Tooltips -->
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
@endsection
