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
            			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            				<thead>
            					<tr>
									<th>Employee ID</th>
									<th>Name</th>
									<th>Birthday</th>
                                    <th>Date Hired</th>
                                    <th>Division/Project</th>
									<th>Position</th>
									<th>Status</th>
            					</tr>
            				</thead>
            				<tbody>
                                @foreach($EmployeeDetail as $EmployeeDetails)
                                    <tr>
                                        <td>{{ $EmployeeDetails->employee_id }}</td>
										<td>{{ strtoupper($EmployeeDetails->lastname).', '.strtoupper($EmployeeDetails->firstname).' '.strtoupper($EmployeeDetails->middlename) }}</td>
										<td>{{ date('F d, Y', strtotime($EmployeeDetails->birthday)) }}</td>
										<td>{{ date('F d, Y', strtotime($EmployeeDetails->date_hired)) }}</td>
                                        <td>{{ strtoupper($EmployeeDetails->division) }}</td>
										<td>{{ strtoupper($EmployeeDetails->position) }}</td>
										<td>{{ strtoupper($EmployeeDetails->status) }}</td>
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

  	<!-- Page level custom scripts -->
  	<script src="{{ asset('admin-template/js/demo/datatables-demo.js') }}"></script>
@endsection