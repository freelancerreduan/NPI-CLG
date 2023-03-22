@include('admin.partials.header')
<!-- Navbar -->
@include('admin.partials.top-nav')
  <!-- /.navbar -->
@include('admin.partials.main-sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @yield('content')
</div>
<!-- /.content-wrapper -->
@include('admin.partials.footer')
