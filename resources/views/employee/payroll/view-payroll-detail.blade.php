@extends('layouts/master')

@section('title', 'Edit Payroll Detail')

@section('extended css')
<style type="text/css">
    input {
        text-transform: uppercase;
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

<div class="row">
    <!-- Add Employee -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">Add Payroll Detail</h6>
                <div class="dropdown no-arrow">
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-area">
                    <form method="POST" action="/employee/payroll/save-payroll-detail/{{ $Employee->id }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="bank_name">Bank Name</label>
                                <select class="form-control @error('bank_name') is-invalid @enderror" id="bank_name"
                                name="bank_name" autofocus>
                                    <option value="N/A">SELECT</option>
                                    <option value="EastWest Bank" @if(old('bank_name') == 'paid') selected @endif>East West Bank</option>
                                    <option value="Robinson Bank" @if(old('bank_name') == 'unpaid') selected @endif>Robinson Bank</option>
                                </select>

                                @error('bank_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="bank_account">Bank Account</label>
                                <input type="text" class="form-control @error('bank_account') is-invalid @enderror"
                                    id="bank_account" name="bank_account">

                                @error('bank_account')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="basic_rate">Basic Rate</label>
                                <input type="number" class="form-control @error('basic_rate') is-invalid @enderror"
                                    id="basic_rate" name="basic_rate">

                                @error('basic_rate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="rata">RATA</label>
                                <input type="number" class="form-control @error('rata') is-invalid @enderror"
                                    id="rata" name="rata">

                                @error('rata')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="pera">PERA</label>
                                <input type="number" class="form-control @error('pera') is-invalid @enderror"
                                    id="pera" name="pera">

                                @error('pera')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="meal_allowance">Meal Allowance</label>
                                <input type="number" class="form-control @error('meal_allowance') is-invalid @enderror"
                                    id="meal_allowance" name="meal_allowance">

                                @error('meal_allowance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div> 
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="project_allowance">Project Allowance</label>
                                <input type="number" class="form-control @error('project_allowance') is-invalid @enderror"
                                    id="project_allowance" name="project_allowance">

                                @error('project_allowance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection