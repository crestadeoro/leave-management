@extends('layouts/master')

@section('title', 'Dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <!-- Add Employee -->
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger">Today's Birthday</h6>
                    <div class="dropdown no-arrow m-0 font-weight-bold text-primary">
                        {{ date("F d, Y") }}
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employee as $employees)
                                    <tr>
                                        @if (date('m-d') == substr($employees->birthday,5,5))
                                            <td>{{ strtoupper($employees->firstname.' '.$employees->lastname) }}</td>
                                            <td>{{ strtoupper($employees->division) }}</td>
                                        @endif
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