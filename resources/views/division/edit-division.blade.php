@extends('layouts/master')

@section('title', 'Edit Division')

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
            <h6 class="m-0 font-weight-bold text-warning">Edit Division/Project</h6>
            <div class="dropdown no-arrow">
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="form-area">
                <form method="POST" action="/division/update-division/{{ $Division->id }}">
                    @method('PATCH')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="division">Division/Project Name</label>
                        <input type="text" class="form-control @error('division') is-invalid @enderror" id="division"
                            name="division" value="{{ $Division->division }}" autofocus>

                        @error('division')
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
