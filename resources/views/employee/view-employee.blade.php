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
    <h1 class="h3 mb-0 text-gray-800">{{ strtoupper($Employee->lastname).', '.strtoupper($Employee->firstname).' '.strtoupper($Employee->middlename) }}</h1>
</div>

<div class="row">
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
                        <label>Birthday:</label>
                        <span>{{ date('F d, Y', strtotime($Employee->birthday)) }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Employment Status:</label>
                        <span>{{ strtoupper($Employee->status) }}</span>
                    </div>
                </div>                                                                
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