<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin | JewCatNovels</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    {{-- BOOTSTRAP CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- FONT AWESOME 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <!-- CSS -->
    <link href="{{ asset('css/admin/master.css') }}" rel="stylesheet">
    @stack('mystyle')
    
  </head>
  <body>  
    {{-- HEADER --}}
    <header>
      <nav class="navbar navbar-expand-lg navbar-light">



        <a class="navbar-brand" href="{{ url('admin') }}">
          <img src="{{ asset('images/jewcatnovels-logo-black.png') }}">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">

              <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="{{ asset('images/users/'.Auth::user()->image_url) }}">
              </a>

              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                  <strong>Account</strong>
                </div>
                
                <a class="dropdown-item text-center" href="#">
                  <i class="fa fa-user"></i> Profile</a>
                
                <div class="dropdown-divider"></div>

                <a class="dropdown-item text-center" href="{{ url('signout') }}">
                  <i class="fas fa-sign-out-alt"></i> Logout</a>
              </div>

            </li>
          </ul>
        </div>

      </nav>
    </header>



    <section class="container-fluid">
      <div class="row">


        {{-- SIDEBAR --}}
        <div class="col-2" id="sidebar">
          <nav class="flex-column">
            <ul>

              <li class="nav-item">
                <a ref class="nav-title drop-trigger d-flex justify-content-between">
                  <div>
                    <i class="fas fa-money-check-alt"></i>
                    &nbsp;
                    <b>Orders</b>
                  </div>
                  <i class="fas fa-angle-left" style="font-size:24px"></i>
                </a>
                <div class="drop-container d-none">
                  <a class="drop-item nav-link" href="{{ url('admin/orders-list') }}">List</a>
                </div>
              </li>
              
              <li class="nav-item">
                <a ref class="nav-title drop-trigger d-flex justify-content-between">
                  <div>
                    <i class="fas fa-book-open"></i>
                    &nbsp;
                    <b>Novels</b>
                  </div>
                  <i class="fas fa-angle-left" style="font-size:24px"></i>
                </a>
                <div class="drop-container d-none">
                  <a class="drop-item nav-link" href="{{ url('admin/novels-list') }}">Novels List</a>
                  <a class="drop-item nav-link" href="{{ url('admin/novels-add') }}">Add Novels</a>
                  <a class="drop-item nav-link" href="{{ url('admin/authors') }}">Authors</a>
                  <a class="drop-item nav-link" href="#">Sale Off</a>
                </div>
              </li>
              

              <li class="nav-item">
                <a ref class="nav-title drop-trigger d-flex justify-content-between">
                  <div>
                    <i class="fas fa-users"></i>
                    &nbsp;
                    <b>Users</b>
                  </div>
                  <i class="fas fa-angle-left" style="font-size:24px"></i>
                </a>
                <div class="drop-container d-none">
                  <a class="drop-item nav-link" href="#">Active List</a>
                  <a class="drop-item nav-link" href="#">Banned List</a>
                  <a class="drop-item nav-link" href="#">Admin List</a>
                </div>
              </li>




            </ul>
          </nav>
        </div>



        {{-- MAIN --}}
        <main id="main" class="col-10">
          @yield('content')
        </main>
        


      </div>
    </section>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('js/popper.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    {{-- Sidebar animation --}}
    <script type="text/javascript">
      $(document).ready(function () {
        $('.drop-trigger').click(function() {
          if($(this).next('.drop-container').hasClass('d-none')) {
            $(this).next('.drop-container').removeClass('d-none');
            $(this).next('.drop-container').addClass('d-block');
            $(this).children('i').addClass('fa-angle-down');
            $(this).children('i').removeClass('fa-angle-left');
          }
          else {
            $(this).next('.drop-container').removeClass('d-block');
            $(this).next('.drop-container').addClass('d-none');
            $(this).children('i').addClass('fa-angle-left');
            $(this).children('i').removeClass('fa-angle-down');
          }    
        });
      });
    </script>
    
    {{-- Price mask --}}
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.price-mask').mask('000.000.000.000.000', {reverse: true});
      });
    </script>

    {{-- Validate bootstrap --}}
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>

    @stack('myscript')

  </body>
</html>
