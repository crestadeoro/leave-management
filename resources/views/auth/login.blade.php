<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Leave Management System</title>

  	<!-- Custom styles for this template-->
  	<link rel="stylesheet" type="text/css" href="{{ asset('admin-template/vendor/fontawesome-free/css/all.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('admin-template/css/sb-admin-2.min.css') }}">

    <!-- welcome css -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
</head>
<body>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <center><h3>Sign In</h3>
                                        <h5>Leave Management System</h5>
                                </center>
                            </div>
                        </div>
                        <br>
                        <form method="POST" action="{{ route('login') }}">
                             @csrf
                             <div class="form-group row">
                                 <label for="email" class="col-md-1 col-form-label"><i class="fas fa-user fa-lg"></i></label>

                                 <div class="col-md-11">
                                     <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username"  autofocus>

                                     @error('username')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                             </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-1 col-form-label"><i class="fas fa-key fa-lg"></i></label>

                                <div class="col-md-11">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"  autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success col-12 login-btn">Proceed</button>
                         </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <!-- jQuery, AJAX, BScdn -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>