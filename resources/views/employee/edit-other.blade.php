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
    <h1 class="h3 mb-0 text-gray-800">Employee Other Details</h1>
</div>

<div class="row">
    <!-- Add Employee -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">Employee Other Details</h6>
                <div class="dropdown no-arrow">
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-area">
                    <form method="POST" action="/employee/save-other/{{ $id }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="place_of_birth">Place of Birth</label>
                                <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror"
                                    id="place_of_birth" name="place_of_birth" value="{{ $other->place_of_birth }}" autofocus>

                                @error('place_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="citizenship">Citizenship</label>
                                <input type="text" class="form-control @error('citizenship') is-invalid @enderror"
                                    id="citizenship" name="citizenship" value="{{ $other->citizenship }}" autofocus>

                                @error('citizenship')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="religion">Religion</label>
                                <input type="text" class="form-control @error('religion') is-invalid @enderror"
                                    id="religion" name="religion" value="{{ $other->religion }}" autofocus>

                                @error('religion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label for="height">Height</label>
                                <input type="text" class="form-control @error('height') is-invalid @enderror"
                                    id="height" name="height" value="{{ $other->height }}" autofocus>

                                @error('height')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control @error('weight') is-invalid @enderror"
                                    id="weight" name="weight" value="{{ $other->weight }}" autofocus>

                                @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label for="blood_type">Blood Type</label>
                                <input type="text" class="form-control @error('blood_type') is-invalid @enderror"
                                    id="blood_type" name="blood_type" value="{{ $other->blood_type }}" autofocus>

                                @error('blood_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label for="hair_color">Hair Color</label>
                                <input type="text" class="form-control @error('hair_color') is-invalid @enderror"
                                    id="hair_color" name="hair_color" value="{{ $other->hair_color }}" autofocus>

                                @error('hair_color')
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
