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
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Employee Detail</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Action:</div>
                        <a class="dropdown-item" href="/employee/edit-employee/{{ $Employee->id }}">Edit</a>
                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                            data-target="#statusModal">Update Status</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Employee ID:</label>
                        <span>{{ $Employee->employee_id }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Division:</label>
                        <span>{{ strtoupper($Employee->division) }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Position:</label>
                        <span>{{ strtoupper($Employee->position) }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Date Hired:</label>
                        <span>{{ date('F d, Y', strtotime($Employee->date_hired)) }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Contact Number:</label>
                        <span>{{ $Employee->contact_number }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Gender:</label>
                        <span>{{ strtoupper($Employee->gender) }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <label>Birthday:</label>
                        <span>{{ date('F d, Y', strtotime($Employee->birthday)) }}</span>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label>Age:</label>
                        <span>{{ $Age }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Address:</label>
                        <span>{{ strtoupper($Employee->address) }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <label>SSS:</label>
                        <span>{{ $Employee->sss }}</span>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <label>PhilHealth:</label>
                        <span>{{ $Employee->philhealth }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <label>HDMF:</label>
                        <span>{{ $Employee->hdmf }}</span>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <label>TIN:</label>
                        <span>{{ $Employee->tin }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <label>Status:</label>
                        <span>{{ strtoupper($Employee->status) }}</span>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        @if ($Employee->status == 'resigned')
                            <label>Resigned Date:</label>
                            <span>{{ date('F d, Y', strtotime($Employee->status_updated_at)) }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Person to contact in case of emergency:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Name:</label>
                        <span>{{ strtoupper($Employee->ptc_name) }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Contact Number:</label>
                        <span>{{ strtoupper($Employee->ptc_number) }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Address:</label>
                        <span>{{ strtoupper($Employee->ptc_address) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
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
                                    @else
                                    <span class="badge badge-danger">{{ strtoupper($Leaves->category) }}</span>
                                    @endif
                                </td>
                                <td><a href="/employee/leave/edit-leave/{{ $Leaves->id }}"
                                        class="btn btn-success btn-sm btn-circle" title="Edit Leave"><i
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

<!-- Payroll Detail -->
<div class="row col-xs-12">
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
                        <a class="dropdown-item" href="/employee/payroll/add-payroll-detail/{{ $Employee->id }}">Updte Payroll Detail</a>
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
                        <a class="btn btn-sm btn-warning" href="/employee/update-status/{{ $Employee->id }}/resigned">Resign</a>
                    </div>
                    <div class="form-group col-sm-6 col-lg-6">
                        <a class="btn btn-sm btn-secondary" href="/employee/update-status/{{ $Employee->id }}/removed">Remove</a>
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
                        <a class="btn btn-sm btn-warning" href="/employee/update-status/{{ $Employee->id }}/resigned">Resign</a>
                    </div>
                    <div class="form-group col-sm-6 col-lg-6">
                        <a class="btn btn-sm btn-secondary" href="/employee/update-status/{{ $Employee->id }}/removed">Remove</a>
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
