@include('admin.partials.header')
<!-- Navbar -->
@include('admin.partials.top-nav')
  <!-- /.navbar -->
@include('admin.partials.main-sidebar')
<!-- Content Wrapper. Contains page content -->
    @yield('content')
<!-- /.content-wrapper -->
@include('admin.partials.footer')
