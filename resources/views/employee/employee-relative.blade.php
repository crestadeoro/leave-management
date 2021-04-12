@extends('layouts/master')

@section('title', 'Add/Edit Employee Relative')

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
    <h1 class="h3 mb-0 text-gray-800">Employee Relative</h1>
</div>

<div class="row">
    <!-- Add Employee -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">Relative Details</h6>
                <div class="dropdown no-arrow">
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-area">
                    <form method="POST" action="/employee/save-relative/{{ $id }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="mother_maiden_name">Mother's Maiden Name</label>
                                <input type="text" class="form-control @error('mother_maiden_name') is-invalid @enderror"
                                    id="mother_maiden_name" name="mother_maiden_name" value="{{ $MotherMaidenName }}" autofocus>

                                @error('mother_maiden_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="mother_occupation">Mother's Occupation</label>
                                <input type="text" class="form-control @error('mother_occupation') is-invalid @enderror"
                                    id="mother_occupation" name="mother_occupation" value="{{ $MotherOccupation }}">

                                @error('mother_occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="mother_name_of_company">Mother's Name of Company</label>
                                <input type="text" class="form-control @error('mother_name_of_company') is-invalid @enderror"
                                    id="mother_name_of_company" name="mother_name_of_company" value="{{ $MotherCompany }}">

                                @error('mother_name_of_company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="mother_contact_number">Mother's Contact Number</label>
                                <input type="text" class="form-control @error('mother_contact_number') is-invalid @enderror"
                                    id="mother_contact_number" name="mother_contact_number" value="{{ $MotherContactNumber }}">

                                @error('mother_contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="father_name">Father's Name</label>
                                <input type="text" class="form-control @error('father_name') is-invalid @enderror"
                                    id="father_name" name="father_name" value="{{ $FatherName }}">

                                @error('father_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="father_occupation">Father's Occupation</label>
                                <input type="text" class="form-control @error('father_occupation') is-invalid @enderror"
                                    id="father_occupation" name="father_occupation" value="{{ $FatherOccupation }}">

                                @error('father_occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="father_name_of_company">Father's Name of Company</label>
                                <input type="text" class="form-control @error('father_name_of_company') is-invalid @enderror"
                                    id="father_name_of_company" name="father_name_of_company" value="{{ $FatherCompany }}">

                                @error('father_name_of_company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="father_contact_number">Mother's Contact Number</label>
                                <input type="text" class="form-control @error('father_contact_number') is-invalid @enderror"
                                    id="father_contact_number" name="father_contact_number" value="{{ $FatherContactNumber }}">

                                @error('father_contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="spouse_name">Spouse's Name</label>
                                <input type="text" class="form-control @error('spouse_name') is-invalid @enderror"
                                    id="spouse_name" name="spouse_name" value="{{ $SpouseName }}">

                                @error('spouse_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="spouse_occupation">Spouse's Occupation</label>
                                <input type="text" class="form-control @error('spouse_occupation') is-invalid @enderror"
                                    id="spouse_occupation" name="spouse_occupation" value="{{ $SpouseOccupation }}">

                                @error('spouse_occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="spouse_name_of_company">Spouse's Name of Company</label>
                                <input type="text" class="form-control @error('spouse_name_of_company') is-invalid @enderror"
                                    id="spouse_name_of_company" name="spouse_name_of_company" value="{{ $SpouseCompany }}">

                                @error('spouse_name_of_company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="spouse_contact_number">Mother's Contact Number</label>
                                <input type="text" class="form-control @error('spouse_contact_number') is-invalid @enderror"
                                    id="spouse_contact_number" name="spouse_contact_number" value="{{ $SpouseContactNumber }}">

                                @error('spouse_contact_number')
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
