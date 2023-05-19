<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin-Login</title>
  <link href="{{asset('assets/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/backend/css/sb-admin.css')}}" rel="stylesheet">

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">pharmacy Login</div>
      <div class="card-body">
         <form action="{{ route('login') }}" method="POST">
            @csrf
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
  
      </div>
    </div>
  </div>

    <script src="{{asset('assets/backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    
</body>
</html>
