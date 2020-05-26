@extends('layouts/master')

@section('title', 'Edit Employee')

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
    <h1 class="h3 mb-0 text-gray-800">{{ strtoupper($Employee->lastname).', '.strtoupper($Employee->firstname).' '.strtoupper($Employee->middlename) }}</h1>
</div>

<div class="row">
    <!-- Add Employee -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">Edit Employee</h6>
                <div class="dropdown no-arrow">
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-area">
                    <form method="POST" action="/employee/update-employee/{{ $Employee->id }}">
                        @method('PATCH')
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="employee_id">Employee Id</label>
                                <input type="text" class="form-control @error('employee_id') is-invalid @enderror"
                                    id="employee_id" name="employee_id" value="{{ $Employee->employee_id }}" autofocus>
    
                                @error('employee_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                    id="firstname" name="firstname" value="{{ $Employee->firstname }}">
    
                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="middlename">Middlename</label>
                                <input type="text" class="form-control @error('middlename') is-invalid @enderror"
                                    id="middlename" name="middlename" value="{{ $Employee->middlename }}">
    
                                @error('middlename')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                    id="lastname" name="lastname" value="{{ $Employee->lastname }}">
    
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>                                                                                    
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="birthday">Birthday</label>
                                <input type="date" class="form-control @error('birthday') is-invalid @enderror"
                                    id="birthday" name="birthday" value="{{ $Employee->birthday }}">
    
                                @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" class="form-control @error('contact_number') is-invalid @enderror"
                                    id="contact_number" name="contact_number" value="{{ $Employee->contact_number }}">
    
                                @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="date_hired">Date Hired</label>
                                <input type="date" class="form-control @error('date_hired') is-invalid @enderror"
                                    id="date_hired" name="date_hired" value="{{ $Employee->date_hired }}">
    
                                @error('date_hired')
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
                                    id="address" name="address" value="{{ $Employee->address }}">
    
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>                                                                                    
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label for="sss">SSS</label>
                                <input type="text" class="form-control @error('sss') is-invalid @enderror"
                                    id="sss" name="sss" value="{{ $Employee->sss }}">
    
                                @error('sss')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label for="philhealth">PhilHealth</label>
                                <input type="text" class="form-control @error('philhealth') is-invalid @enderror"
                                    id="philhealth" name="philhealth" value="{{ $Employee->philhealth }}">
    
                                @error('philhealth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label for="hdmf">HDMF</label>
                                <input type="text" class="form-control @error('hdmf') is-invalid @enderror"
                                    id="hdmf" name="hdmf" value="{{ $Employee->hdmf }}">
    
                                @error('hdmf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label for="tin">TIN</label>
                                <input type="text" class="form-control @error('tin') is-invalid @enderror"
                                    id="tin" name="tin" value="{{ $Employee->tin }}">
    
                                @error('tin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>                                                                                    
                        </div>                                                
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="division">Division/Project</label>
                                <select class="form-control @error('division') is-invalid @enderror" id="division"
                                name="division">
                                    <option value="">SELECT</option>
                                    @foreach ($Division as $Divisions)
                                        <option value="{{ $Divisions->id }}" @if($Employee->division == $Divisions->division) selected
                                            @endif>{{ strtoupper($Divisions->division) }}</option>
                                    @endforeach
                                </select>
    
                                @error('division')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <label for="position">Position</label>
                                <select class="form-control @error('position') is-invalid @enderror" id="position"
                                name="position">
                                    <option value="">SELECT</option>
                                    @foreach ($Position as $Positions)
                                        <option value="{{ $Positions->id }}" @if($Employee->position == $Positions->position) selected
                                            @endif>{{ strtoupper($Positions->position) }}</option>
                                    @endforeach
                                </select>
    
                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>                                                                                   
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                name="status">
                                    <option value="">SELECT</option>
                                    <option value="contractual" @if($Employee->status == 'contractual') selected @endif>CONTRACTUAL</option>
                                    <option value="probitionary" @if($Employee->status == 'probitionary') selected @endif>PROBITIONARY</option>
                                    <option value="regular" @if($Employee->status == 'regular') selected @endif>REGULAR</option>
                                    <option value="resigned" @if($Employee->status == 'resigned') selected @endif>RESIGNED</option>
                                    <option value="terminated" @if($Employee->status == 'terminated') selected @endif>TERMINATED</option>
                                </select>
    
                                @error('status')
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

@if (session('success'))
<div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="3000"
    style="position: absolute; top: 75px; right: 0; width: 250px">
    <div class="toast-header">
        <strong class="mr-auto">GoldridgeCDC</strong>
        <small>Now</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{ session('success') }}
    </div>
</div>
@endif
@endsection

@section('extended js')
<script type="text/javascript">
    $('.toast').toast('show')
</script>
@endsection