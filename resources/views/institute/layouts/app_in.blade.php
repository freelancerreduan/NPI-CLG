@include('institute.partials.header')
<!-- Navbar -->
@include('institute.partials.top-nav')
  <!-- /.navbar -->
@include('institute.partials.main-sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @yield('content')
</div>
<!-- /.content-wrapper -->
@include('institute.partials.footer')
