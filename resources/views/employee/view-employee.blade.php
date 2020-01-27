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
                        <label>Date Hired:</label>
                        <span>{{ date('F d, Y', strtotime($Employee->birthday)) }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <label>Date Hired:</label>
                        <span class="text-success">{{ strtoupper($Employee->status) }}</span>
                    </div>
                </div>                                                                
            </div>
        </div>
    </div>
</div>
@endsection