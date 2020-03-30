@extends('layouts/master')

@section('title', 'Division')

@section('extended css')
<style type="text/css">
    input {
        text-transform: uppercase;
	}
	
	table{
		font-size: 10pt;
	}
</style>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Division/Project</h1>
    </div>

    <div class="row">
        <!-- View Position -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        	<div class="card shadow mb-4">
            	<!-- Card Header -->
            	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              		<h6 class="m-0 font-weight-bold text-warning">View Division/Project</h6>
              		<div class="dropdown no-arrow">
              		</div>
            	</div>
            	<!-- Card Body -->
            	<div class="card-body">
            		<div class="table-responsive">
            			<table class="table table-bordered table-division" id="dataTable" width="100%" cellspacing="0">
            				<thead>
            					<tr>
									<th>Division/Project</th>
									<th>Action</th>
            					</tr>
            				</thead>
            				<tbody>
                                @foreach($Division as $Divisions)
                                    <tr>
                                        <td>{{ $Divisions->division }}</td>
										<td><a href="/employee/edit-division/{{ $Divisions->id }}" class="btn btn-success btn-sm btn-circle"><i class="fas fa-eye"></i></i></a></td>
                                    </tr>
                                @endforeach
            				</tbody>
            			</table>
            		</div>
            	</div>
          	</div>
        </div>
        
        <!-- Add Position -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        	<div class="card shadow mb-4">
            	<!-- Card Header -->
            	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              		<h6 class="m-0 font-weight-bold text-warning">Add Division/Project</h6>
              		<div class="dropdown no-arrow">
              		</div>
            	</div>
            	<!-- Card Body -->
            	<div class="card-body">
            		<div class="form-area">
                		<form method="POST" action="/division/save-division">
                			{{ csrf_field() }}
                			<div class="form-group">
    							<label for="division">Division/Project Name</label>
    							<input type="text" class="form-control @error('division') is-invalid @enderror" id="division" name="division" autofocus>

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

	<!-- Page level plugins -->
	<script src="{{ asset('admin-template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin-template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

	<!-- Page level custom scripts -->
	<script src="{{ asset('admin-template/js/demo/datatables-demo.js') }}"></script>
@endsection