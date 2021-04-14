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
    <h1 class="h3 mb-0 text-gray-800">Employee Person to Contact</h1>
</div>

<div class="row">
    <!-- Add Employee -->
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">Person to Contact Details</h6>
                <div class="dropdown no-arrow">
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-area">
                    <form method="POST" action="/employee/save-contact/{{ $id }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="contact_person">Name</label>
                                <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                                    id="contact_person" name="contact_person" value="{{ $contact_person }}" autofocus>

                                @error('contact_person')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" class="form-control @error('contact_number') is-invalid @enderror"
                                    id="contact_number" name="contact_number" value="{{ $contact_number }}">

                                @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="relationship">Relationship</label>
                                <input type="text" class="form-control @error('relationship') is-invalid @enderror"
                                    id="relationship" name="relationship" value="{{ $relationship }}">

                                @error('relationship')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    id="address" name="address" value="{{ $address }}">

                                @error('address')
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
