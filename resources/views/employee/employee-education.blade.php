@extends('layouts/master')

@section('title', 'Add Employee Educational Background Detail')

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
    <h1 class="h3 mb-0 text-gray-800">Employee Educational Backround</h1>
</div>

<div class="row">
    <!-- Add Employee -->
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">Educational Background Details</h6>
                <div class="dropdown no-arrow">
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-area">
                    <form method="POST" action="/employee/save-education/{{ $id }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="school_name">School Name</label>
                                <input type="text" class="form-control @error('school_name') is-invalid @enderror"
                                    id="school_name" name="school_name" value="{{ old('school_name') }}" autofocus>

                                @error('school_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="degree">Degree</label>
                                <select class="form-control @error('degree')        is-invalid @enderror" id="degree"
                                    name="degree">
                                    <option value="">SELECT</option>
                                    <option value="no schooling" @if(old('no schooling' )=='no schooling' ) selected @endif>NO SCHOOLING
                                    </option>
                                    <option value="high school level" @if(old('high school level' )=='high school level' ) selected @endif>HIGH SCHOOL LEVEL
                                    </option>
                                    <option value="high school graduate" @if(old('high school graduate' )=='high school graduate' ) selected @endif>HIGH SCHOOL GRADUATED
                                    </option>
                                    <option value="technical vocation" @if(old('technical vocation' )=='technical vocation' ) selected @endif>TECHNICAL VOCATION
                                    </option>
                                    <option value="college level" @if(old('college level' )=='college level' ) selected @endif>COLLEGE LEVEL
                                    </option>
                                    <option value="associate degree" @if(old('associate degree' )=='associate degree' ) selected @endif>ASSOCIATE'S DEGREE
                                    </option>
                                    <option value="bachelor degree" @if(old('bachelor degree' )=='bachelor degree' ) selected @endif>BACHELOR'S DEGREE
                                    </option>
                                    <option value="master degree" @if(old('master degree' )=='master degree' ) selected @endif>MASTER'S DEGREE
                                    </option>
                                    <option value="professional school degree" @if(old('professional school degree' )=='professional school degree' ) selected @endif>PROFESSIONAL SCHOOL DEGREE
                                    </option>
                                    <option value="doctorate degree" @if(old('doctorate degree' )=='doctorate degree' ) selected @endif>DOCTORATE'S DEGREE
                                    </option>
                                </select>

                                @error('degree')
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
