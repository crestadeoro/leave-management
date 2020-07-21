@extends('layouts/master')

@section('title', 'Edit Leave')

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
        {{ $EmployeeName }}
    </h1>
</div>

<div class="row">
    <!-- Add Employee -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">Add Leave</h6>
                <div class="dropdown no-arrow">
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-area">
                    <form method="POST" action="/employee/leave/update-leave/{{ $Leave->id }}">
                        @method('PATCH')
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="leave-from">Leave From</label>
                                <input type="date" class="form-control @error('date_from') is-invalid @enderror"
                                    id="date_from" name="date_from" value="{{ $Leave->date_from }}" autofocus>

                                @error('date_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="leave-to">Leave To</label>
                                <input type="date" class="form-control @error('date_to') is-invalid @enderror"
                                    id="date_to" name="date_to" value="{{ $Leave->date_to }}">

                                @error('date_to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <label for="category">Category</label>
                                <select class="form-control @error('category') is-invalid @enderror" id="category"
                                name="category">
                                    <option value="">SELECT</option>
                                    <option value="paid" @if($Leave->category == 'paid') selected @endif>PAID</option>
                                    <option value="unpaid" @if($Leave->category == 'unpaid') selected @endif>UNPAID</option>
                                    <option value="subsidy" @if($Leave->category == 'subsidy') selected @endif>SUBSIDY</option>
                                </select>

                                @error('category')
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
