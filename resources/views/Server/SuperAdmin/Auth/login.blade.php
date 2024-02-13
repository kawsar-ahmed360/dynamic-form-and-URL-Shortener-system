<!DOCTYPE html>
<html lang="en">
  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="">
    <meta name="twitter:creator" content="">
    <meta name="twitter:card" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="Super Admin Login">
    



    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="SuperAdmin">

    <title>Super Admin Login</title>

    <!-- vendor css -->
    <link href="{{asset('Server/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('Server/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('Server/css/bracket.css')}}">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><img style="width: 256px;" src="{{asset('super_logo.png')}}" alt=""></div>
        <div class="tx-center mg-b-60"></div>

        <form method="POST" action="{{ route('login') }}">
         @csrf
        <div class="form-group">
          <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your username" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
        @enderror
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" required autocomplete="current-password">
          @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
            @enderror
          <a href="#" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign In</button>
        </form>

        <div class="mg-t-40 tx-center">
            <!-- Not yet a member? <a href="#" class="tx-info">Sign Up</a> -->
    </div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="{{asset('Server/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('Server/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('Server/lib/bootstrap/bootstrap.js')}}"></script>

  </body>


</html>




