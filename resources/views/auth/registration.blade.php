<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Maxton | Bootstrap 5 Admin Dashboard Template</title>
  <!--favicon-->
  <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png">
  <!-- loader-->
  <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/js/pace.min.js') }}"></script>

  <!--plugins-->
  <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/metismenu/metisMenu.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/metismenu/mm-vertical.css') }}">
  <!--bootstrap css-->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
  <!--main css-->
  <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
  <link href="{{ asset('sass/main.css') }}" rel="stylesheet">
  <link href="{{ asset('sass/dark-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('sass/blue-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('sass/responsive.css') }}" rel="stylesheet">

  </head>

<body>


  <!--authentication-->

  <div class="section-authentication-cover">
    <div class="">
      <div class="row g-0">

        <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex border-end bg-transparent">

          <div class="card rounded-0 mb-0 border-0 shadow-none bg-transparent bg-none">
            <div class="card-body">
              <img src="{{ asset('assets/images/auth/register1.png') }}" class="img-fluid auth-img-cover-login" width="500"
                alt="">
            </div>
          </div>

        </div>

        <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
          <div class="card rounded-0 m-3 border-0 shadow-none bg-none">
            <div class="card-body p-sm-5">
              <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgZ8QW6ubp4JYzxwKvEhYQoHSxxgHquq9NR8KMVCnDbWAcHyUqONQ4Kty1igF8bUa1eg3Iy3dWQfXIEIxiEZAsGpZRDqVI4GUvLE78LgNYhZb4DlHWAye965ZXXjsQiXq3do7Q5NbKNh3o/s1177/Alumna+Indonesia+Islamic+School+Pekanbaru.png" class="mb-4" width="145" alt="">
              <h4 class="fw-bold">Get Started Now</h4>
              <p class="mb-0">Enter your credentials to create your account</p>
              <div class="form-body mt-4">
                <form action="/registrations/add" method="POST" class="row g-3">
                  @csrf
                  <div class="col-12">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" name="name" class="form-control" id="inputUsername" placeholder="Jhon" value="{{ old('name') }}">
                  </div>
                  <div class="col-12">
                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" value="{{ old('email') }}">
                  </div>
                  <div class="col-12">
                    <label for="inputChoosePassword" class="form-label">Password</label>
                    <div class="input-group" id="show_hide_password">
                      <input type="password" name="password" class="form-control" id="inputChoosePassword" placeholder="Enter Password">
                       <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-grd-danger">Register</button>
                    </div>
                  </div>
                </form>
              </div>

          </div>
          </div>
        </div>

      </div>
      <!--end row-->
    </div>
  </div>

  <!--authentication-->

@if(session('error'))
 <div class="position-absolute top-0 end-0 p-3" style="z-index: 11">
    <div class=" alert alert-danger border-0 bg-grd-danger alert-dismissible fade show">
									<div class="d-flex align-items-center">
										<div class="font-35 text-white"><span class="material-icons-outlined fs-2">report_gmailerrorred</span>
										</div>
										<div class="ms-3">
											<h6 class="mb-0 text-white">Alerts</h6>
											<div class="text-white">{{ session('error') }} &#128548;</div>
										</div>
									</div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
</div>
    
@endif


   <!--bootstrap js-->
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
 
   <!--plugins-->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
   <!--plugins-->
  <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/plugins/metismenu/metisMenu.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script>
    $(document).ready(function () {
      $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bi-eye-slash-fill");
          $('#show_hide_password i').removeClass("bi-eye-fill");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bi-eye-slash-fill");
          $('#show_hide_password i').addClass("bi-eye-fill");
        }
      });
    });
  </script>

</body>

</html>