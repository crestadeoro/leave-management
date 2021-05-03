@extends('layouts/master')



@section('title', 'View Employee')



@section('extended css')

<style type="text/css">
    label {

        font-weight: bold;

    }

</style>

@endsection



@section('content')

<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">

        {{ strtoupper($Employee->lastname).', '.strtoupper($Employee->firstname).' '.strtoupper($Employee->middlename) }}

    </h1>

</div>

<div class="row col-xs-12">
    <!-- Employee Basic Informatio -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <div class="card shadow mb-4">

            <!-- Card Header -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <h6 class="m-0 font-weight-bold text-primary">Employee Basic Information</h6>

                <div class="dropdown no-arrow">

                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">

                        <div class="dropdown-header">Action:</div>

                        <a class="dropdown-item" href="/employee/edit-employee/{{ $Employee->id }}">Edit Basic
                            Details</a>

                        <a class="dropdown-item" href="/employee/edit-other/{{ $Employee->id }}">Edit Other Details</a>

                        <a class="dropdown-item" href="/employee/add-contact/{{ $Employee->id }}">Add/Edit Person to Contact</a>

                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                            data-target="#statusModal">Update Status</a>

                    </div>

                </div>

            </div>

            <!-- Card Body -->

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 col-xs-6">

                        <label class="text-danger">Employee ID:</label>

                        <span>{{ $Employee->employee_id }}</span>

                    </div>

                    <div class="col-md-6 col-xs-6">

                        <label class="text-danger">Date Hired:</label>

                        <span>{{ date('F d, Y', strtotime($Employee->date_hired)) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 col-xs-6">

                        <label class="text-danger">Division:</label>

                        <span>{{ strtoupper($Employee->division) }}</span>

                    </div>

                    <div class="col-md-6 col-xs-6">

                        <label class="text-danger">Position:</label>

                        <span>{{ strtoupper($Employee->position) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label class="text-danger">Employment Status:</label>

                        <span>{{ strtoupper($Employee->status) }}</span>

                    </div>

                </div>

                <hr>

                <div class="row">

                    <div class="col-md-6 col-xs-6">

                        <label class="text-warning">Mobile Number:</label>

                        <span>{{ $Employee->contact_number }}</span>

                    </div>

                    <div class="col-md-6 col-xs-6">

                        <label class="text-warning">Telephone Number:</label>

                        <span>{{ $Employee->telephone_number }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 col-xs-6">

                        <label class="text-warning">Gender:</label>

                        <span>{{ strtoupper($Employee->gender) }}</span>

                    </div>

                    <div class="col-md-6 col-xs-6">

                        <label class="text-warning">Civil Status:</label>

                        <span>{{ $Employee->civil_status }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 col-xs-12">

                        <label class="text-warning">Birthday:</label>

                        <span>{{ date('F d, Y', strtotime($Employee->birthday)) }}</span>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <label class="text-warning">Age:</label>

                        <span>{{ $Age }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label class="text-warning">Email Address:</label>

                        <span>{{ $Employee->email_address }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label class="text-warning">Address:</label>

                        <span>{{ strtoupper($Employee->address) }}</span>

                    </div>

                </div>

                <hr>

                <div class="row">

                    <div class="col-md-6 col-xs-6">

                        <label class="text-info">SSS:</label>

                        <span>{{ $Employee->sss }}</span>

                    </div>

                    <div class="col-md-6 col-xs-6">

                        <label class="text-info">PhilHealth:</label>

                        <span>{{ $Employee->philhealth }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 col-xs-6">

                        <label class="text-info">HDMF:</label>

                        <span>{{ $Employee->hdmf }}</span>

                    </div>

                    <div class="col-md-6 col-xs-6">

                        <label class="text-info">TIN:</label>

                        <span>{{ $Employee->tin }}</span>

                    </div>

                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Person to contact in case of emergency:</label>
                    </div> 
                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label class="text-success">Name:</label>

                        <span>{{ strtoupper($contact_person) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 col-xs-6">

                        <label class="text-success">Contact Number:</label>

                        <span>{{ strtoupper($contact_number) }}</span>

                    </div>

                    <div class="col-md-6 col-xs-6">

                        <label class="text-success">Relationship:</label>

                        <span>{{ strtoupper($relationship) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label class="text-success">Address:</label>

                        <span>{{ strtoupper($address) }}</span>

                    </div>

                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Employee Other Details:</label>
                    </div> 
                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label class="text-primary">Place of Birth:</label>

                        <span>{{ strtoupper($Employee->place_of_birth) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label class="text-primary">Citizenship:</label>

                        <span>{{ strtoupper($Employee->citizenship) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label class="text-primary">Religion:</label>

                        <span>{{ strtoupper($Employee->religion) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 col-xs-6">

                        <label class="text-primary">Height:</label>

                        <span>{{ $Employee->height }}</span>

                    </div>

                    <div class="col-md-6 col-xs-6">

                        <label class="text-primary">Weight:</label>

                        <span>{{ $Employee->weight }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 col-xs-6">

                        <label class="text-primary">Blood Type:</label>

                        <span>{{ strtoupper($Employee->blood_type) }}</span>

                    </div>

                    <div class="col-md-6 col-xs-6">

                        <label class="text-primary">Hair Color:</label>

                        <span>{{ strtoupper($Employee->hair_color) }}</span>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

    	        <div class="card shadow mb-4">

            <!-- Card Header -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <h6 class="m-0 font-weight-bold text-primary">Payroll Detail</h6>

                <div class="dropdown no-arrow">

                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">

                        <div class="dropdown-header">Action:</div>

                        <a class="dropdown-item" href="/employee/payroll/add-payroll-detail/{{ $Employee->id }}">Updte
                            Payroll Detail</a>

                    </div>

                </div>

            </div>

            <!-- Card Body -->

            <div class="card-body">

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Bank Name:</label>

                        <span>{{ $Employee->bank_name }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Bank Account:</label>

                        <span>{{ $Employee->bank_account }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Basic Rate:</label>

                        <span>{{ number_format($Employee->basic_rate, 2) }}</span>

                    </div>

                </div>

               	<div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Daily Rate:</label>

                        <span>{{ number_format(($Employee->basic_rate * 12)/313, 2) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>RATA:</label>

                        <span>{{ number_format($Employee->rata, 2) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>PERA:</label>

                        <span>{{ number_format($Employee->pera, 2) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Meal Allowance:</label>

                        <span>{{ number_format($Employee->meal_allowance, 2) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Project Allowance:</label>

                        <span>{{ number_format($Employee->project_allowance, 2) }}</span>

                    </div>

                </div>

            </div>

        </div>

        <div class="card shadow mb-4">

            <!-- Card Header -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <h6 class="m-0 font-weight-bold text-primary">Employee Leave</h6>

                <div class="dropdown no-arrow">

                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">

                        <div class="dropdown-header">Action:</div>

                        <a class="dropdown-item" href="/employee/leave/add-leave/{{ $Employee->id }}">Add Leave</a>

                    </div>

                </div>

            </div>

            <!-- Card Body -->

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>

                            <tr>

                                <th>Date From</th>

                                <th>Date To</th>

                                <th>Type</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($Leave as $Leaves)

                            <tr>

                                <td>{{ date('F d, Y', strtotime($Leaves->date_from)) }}</td>

                                <td>{{ date('F d, Y', strtotime($Leaves->date_to)) }}</td>

                                <td>

                                    @if($Leaves->category == 'paid')

                                    <span class="badge badge-primary">{{ strtoupper($Leaves->category) }}</span>

                                    @elseif($Leaves->category == 'subsidy')

                                    <span class="badge badge-warning">{{ strtoupper($Leaves->category) }}</span>

                                    @elseif($Leaves->category == 'unpaid')

                                    <span class="badge badge-danger">{{ strtoupper($Leaves->category) }}</span>

                                    @elseif($Leaves->category == 'half day paid')

                                    <span class="badge badge-success">{{ strtoupper($Leaves->category) }}</span>

                                    @else

                                    <span class="badge badge-info">{{ strtoupper($Leaves->category) }}</span>

                                    @endif

                                </td>

                                <td><a href="/employee/leave/edit-leave/{{ $Leaves->id }}"
                                        class="btn btn-success btn-sm btn-circle" title="Edit Leave"><i
                                            class="fas fa-pencil-alt"></i></a>

                                    <a href="/employee/leave/delete-leave/{{ $Leaves->id }}"
                                        class="btn btn-danger btn-sm btn-circle" title="Edit Leave"><i
                                            class="fas fa-trash-alt"></i></a>

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

                <div class="card shadow mb-4">

            <!-- Card Header -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <h6 class="m-0 font-weight-bold text-primary">Issued PPE</h6>

                <div class="dropdown no-arrow">

                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">

                        <div class="dropdown-header">Action:</div>

                        <a class="dropdown-item" href="/employee/ppe/add-ppe/{{ $Employee->id }}">Add PPE</a>

                    </div>

                </div>

            </div>

            <!-- Card Body -->

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>

                            <tr>

                                <th>Quantity</th>

                                <th>Item</th>

                                <th>Date Issued</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($Ppe as $Ppes)

                            <tr>

                                <td>{{ $Ppes->quantity }}</td>

                                <td>{{ strtoupper($Ppes->item) }}</td>

                                <td>{{ date('F d, Y', strtotime($Ppes->date_issued)) }}</td>

                                <td><a href="/employee/ppe/edit-ppe/{{ $Ppes->id }}"
                                        class="btn btn-success btn-sm btn-circle" title="Edit PPE"><i
                                            class="fas fa-pencil-alt"></i></a>

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


<div class="row col-xs-12">

    <!-- Employee Relative Details -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <div class="card shadow mb-4">

            <!-- Card Header -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <h6 class="m-0 font-weight-bold text-primary">Employee Relative Information</h6>

                <div class="dropdown no-arrow">

                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">

                        <div class="dropdown-header">Action:</div>

                        <a class="dropdown-item" href="/employee/employee-relative/{{ $Employee->id }}">Add/Edit
                            Relative Details</a>

                    </div>

                </div>

            </div>

            <!-- Card Body -->

            <div class="card-body">

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Mother's Maiden Name:</label>

                        <span>{{ strtoupper($MotherMaidenName) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Occupation:</label>

                        <span>{{ strtoupper($MotherOccupation) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Company Name:</label>

                        <span>{{ strtoupper($MotherCompany) }}</span>

                    </div>

                </div>

                <hr>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Father's Maiden Name:</label>

                        <span>{{ strtoupper($FatherName) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Occupation:</label>

                        <span>{{ strtoupper($FatherOccupation) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Company Name:</label>

                        <span>{{ strtoupper($FatherCompany) }}</span>

                    </div>

                </div>

                <hr>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Spouse's Name:</label>

                        <span>{{ strtoupper($SpouseName) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Occupation:</label>

                        <span>{{ strtoupper($SpouseOccupation) }}</span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Company Name:</label>

                        <span>{{ strtoupper($SpouseCompany) }}</span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row col-xs-12">
    <!-- Employee Dependent Details -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <div class="card shadow mb-4">

            <!-- Card Header -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <h6 class="m-0 font-weight-bold text-primary">Employee Dependent Information</h6>

                <div class="dropdown no-arrow">

                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">

                        <div class="dropdown-header">Action:</div>

                        <a class="dropdown-item" href="/employee/employee-dependent/{{ $Employee->id }}">Add Dependent
                            Details</a>

                    </div>

                </div>

            </div>

            <!-- Card Body -->

            <div class="card-body">

                @if ($Dependents != '[]')
                @foreach ($Dependents as $Dependent)
                <div class="row">

                    <div class="col-md-8 col-xs-8">

                        <label>Dependent Name:</label>

                        <span>{{ strtoupper($Dependent->dependent_name) }}</span>

                    </div>

                    <div class="col-md-4 col-xs-4">
                        <a href="/employee/edit-dependent/{{ $Dependent->id }}"
                            class="btn btn-warning btn-sm btn-circle" title="View Record"><i
                                class="fas fa-edit"></i></a>

                        <a href="/employee/delete-dependent/{{ $Dependent->id }}"
                            class="btn btn-danger btn-sm btn-circle" title="View Record"><i
                                class="fas fa-trash-alt"></i></a>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Birthdate:</label>

                        <span>{{ date('F d, Y', strtotime($Dependent->dependent_birthdate)) }}</span>

                    </div>

                </div>
                @endforeach
                @else
                <!-- None -->
                @endif

            </div>

        </div>

    </div>
</div>

<div class="row col-xs-12">
    <!-- Employee Educational Background Details -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <div class="card shadow mb-4">

            <!-- Card Header -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <h6 class="m-0 font-weight-bold text-primary">Employee Educational Background Information</h6>

                <div class="dropdown no-arrow">

                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">

                        <div class="dropdown-header">Action:</div>

                        <a class="dropdown-item" href="/employee/employee-education/{{ $Employee->id }}">Add Educational Background</a>

                    </div>

                </div>

            </div>

            <!-- Card Body -->

            <div class="card-body">

                @if ($educations != '[]')
                @foreach ($educations as $education)
                <div class="row">

                    <div class="col-md-10 col-xs-10">

                        <label>School Name:</label>

                        <span>{{ strtoupper($education->school_name) }}</span>

                    </div>

                    <div class="col-md-2 col-xs-2">
                        <a href="/employee/edit-education/{{ $education->id }}"
                            class="btn btn-warning btn-sm btn-circle" title="View Record"><i
                                class="fas fa-edit"></i></a>

                        <a href="/employee/delete-education/{{ $education->id }}"
                            class="btn btn-danger btn-sm btn-circle" title="View Record"><i
                                class="fas fa-trash-alt"></i></a>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 col-xs-12">

                        <label>Degree:</label>

                        <span>{{ strtoupper($education->degree) }}</span>

                    </div>

                </div>
                @endforeach
                @else
                <!-- None -->
                @endif

            </div>

        </div>

    </div>
</div>



<!-- Update Status Modal -->

<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="form-group col-sm-6 col-lg-6">

                        <a class="btn btn-sm btn-warning"
                            href="/employee/update-status/{{ $Employee->id }}/resigned">Resign</a>

                    </div>

                    <div class="form-group col-sm-6 col-lg-6">

                        <a class="btn btn-sm btn-secondary"
                            href="/employee/update-status/{{ $Employee->id }}/removed">Remove</a>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

            </div>

        </div>

    </div>

</div>



<!-- Update Status Modal -->

<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="form-group col-sm-6 col-lg-6">

                        <a class="btn btn-sm btn-warning"
                            href="/employee/update-status/{{ $Employee->id }}/resigned">Resign</a>

                    </div>

                    <div class="form-group col-sm-6 col-lg-6">

                        <a class="btn btn-sm btn-secondary"
                            href="/employee/update-status/{{ $Employee->id }}/removed">Remove</a>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

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

<script type="text/javascript">
    $('.toast').toast('show')

</script>

@endsection
