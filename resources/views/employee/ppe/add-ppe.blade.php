@extends('layouts/master')



@section('title', 'Add PPE')



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

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

        <div class="card shadow mb-4">

            <!-- Card Header -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <h6 class="m-0 font-weight-bold text-warning">Add PPE</h6>

                <div class="dropdown no-arrow">

                </div>

            </div>

            <!-- Card Body -->

            <div class="card-body">

                <div class="form-area">

                    <form method="POST" action="/employee/ppe/save-ppe/{{ $Employee->id }}">

                        {{ csrf_field() }}

                        <div class="row">

                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                <label for="quantity">Quantity</label>

                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"

                                    id="quantity" name="quantity" value="{{ old('quantity') }}" autofocus>



                                @error('quantity')

                                <span class="invalid-feedback" role="alert">

                                    <strong>{{ $message }}</strong>

                                </span>

                                @enderror

                            </div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                <label for="date-issued">Date Issued</label>

                                <input type="date" class="form-control @error('date_issued') is-invalid @enderror"

                                    id="date_issued" name="date_issued" value="{{ old('date_issued') }}">



                                @error('date_issued')

                                <span class="invalid-feedback" role="alert">

                                    <strong>{{ $message }}</strong>

                                </span>

                                @enderror

                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                <label for="item">Item</label>

                                <select class="form-control @error('item') is-invalid @enderror" id="item"

                                name="item">

                                    <option value="">SELECT</option>

                                    <option value="longsleeves" @if(old('item') == 'longsleeves') selected @endif>LONGSLEEVES</option>

                                    <option value="polo shirt" @if(old('item') == 'polo shirt') selected @endif>POLO SHIRT</option>

                                    <option value="safety shoes" @if(old('item') == 'safety shoes') selected @endif>SAFETY SHOES</option>

                                    <option value="raincoat" @if(old('item') == 'raincoat') selected @endif>RAINCOAT</option>

                                    <option value="rainboots" @if(old('item') == 'rainboots') selected @endif>RAINBOOTS</option>

                                    <option value="safety helmet" @if(old('item') == 'safety helmet') selected @endif>SAFETY HELMET</option>

                                    <option value="safety vest" @if(old('item') == 'safety vest') selected @endif>SAFETY VEST</option>

                                </select>



                                @error('item')

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