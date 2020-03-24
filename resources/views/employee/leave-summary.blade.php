@extends('layouts/master')

@section('title', 'Leave Summary')

@section('extended css')
<style rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></style>
<style rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"></style>
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Summery</h1>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Leave Summary</h6>
                <div class="dropdown no-arrow">
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-employee" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Division</th>
                                <th>Position</th>
                                <th>Date From</th>
                                <th>Date To</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($LeaveSummary as $LeaveSummaries)
                            <tr>
                                <td>{{ strtoupper($LeaveSummaries->lastname).', '.strtoupper($LeaveSummaries->firstname).' '.strtoupper($LeaveSummaries->middlename) }}</td>
                                <td>{{ strtoupper($LeaveSummaries->division) }}
                                </td>
                                <td>{{ strtoupper($LeaveSummaries->position) }}</td>
                                <td>{{ date('F d, Y', strtotime($LeaveSummaries->date_from)) }}</td>
                                <td>{{ date('F d, Y', strtotime($LeaveSummaries->date_to)) }}</td>
                                <td>{{ strtoupper($LeaveSummaries->category) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extended js')
<!-- Page level plugins -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin-template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts 
<script src="{{ asset('admin-template/js/demo/datatables-demo.js') }}"></script> -->

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    });
</script>
@endsection