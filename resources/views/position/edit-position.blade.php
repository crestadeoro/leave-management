@extends('layouts/master')

@section('title', 'Edit Position')

@section('extended css')
<style type="text/css">
    input {
        text-transform: uppercase;
    }

</style>
@endsection

@section('content')
<!-- Add Position -->
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="card shadow mb-4">
        <!-- Card Header -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-warning">Edit Position</h6>
            <div class="dropdown no-arrow">
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="form-area">
                <form method="POST" action="/position/update-position/{{ $Position->id }}">
                    @method('PATCH')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control @error('position') is-invalid @enderror" id="position"
                            name="position" value="{{ $Position->position }}" autofocus>

                        @error('position')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
