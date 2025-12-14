@include('layouts.header')
@include('layouts.topbar')
@include('layouts.sidebar')
  <!--start main wrapper-->
  <main class="main-wrapper">
    <div class="main-content">
        @yield('content')
    </div>
  </main>
  <!--end main wrapper-->
@include('layouts.footer')