<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin | JewCatNovels</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- FONT AWESOME 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    {{-- CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/signin.css') }}">

  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">

        <form method="POST" class="card-container col-5">
          @csrf
          <div class="card p-4">
            <div class="card-body">
              <h1>JewCatNovels</h1>
              <p class="text-muted">Sign In to your account</p>

              @if(Session::get('errorSignin'))
              <div class="alert alert-danger">
                {{ Session::get('errorSignin') }}
              </div>
              @endif

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                  </span>
                </div>
                <input class="form-control" type="text" placeholder="Email" name="txtEmail" required>
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-lock"></i>
                  </span>
                </div>
                <input class="form-control" type="password" placeholder="Password" name="txtPassword" required>
              </div>
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-primary px-4" type="submit">Login</button>
                </div>
                <div class="col-6 text-right">
                  <button class="btn btn-link px-0" type="button">Forgot password?</button>
                </div>
              </div>
            </div>
          </div>

        </form>

      </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>