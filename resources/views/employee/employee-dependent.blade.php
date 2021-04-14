@extends('layouts/master')

@section('title', 'Add Employee Dependent')

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
    <h1 class="h3 mb-0 text-gray-800">Employee Dependent</h1>
</div>

<div class="row">
    <!-- Add Employee -->
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
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
                    <form method="POST" action="/employee/save-dependent/{{ $id }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="dependent_name">Dependent Name</label>
                                <input type="text" class="form-control @error('dependent_name') is-invalid @enderror"
                                    id="dependent_name" name="dependent_name" value="{{ old('dependent_name') }}" autofocus>

                                @error('dependent_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="dependent_birthdate">Birthdate</label>
                                <input type="date" class="form-control @error('dependent_birthdate') is-invalid @enderror"
                                    id="dependent_birthdate" name="dependent_birthdate" value="{{ old('dependent_birthdate') }}">

                                @error('dependent_birthdate')
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
