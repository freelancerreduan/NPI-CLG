@extends('admin.layouts.app_admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Teachers List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Teachers List</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card">

        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SI</th>
                        <th>Teachar</th>
                        <th>Short Description</th>
                        <th>Social Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <img src="{{ asset($teacher->image) }}" alt="" class="img-fluid rounded" width="100">
                                    <div class="right-ariea ml-2">
                                        <p class="my-0 py-0"><b>{{ $teacher->name }}</b></p>
                                        <p class="py-0 my-0">{{ $teacher->title }}</p>
                                        <p class="py-0 my-0">{{ $teacher->number }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $teacher->short_description }}</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-around">
                                    @if ($teacher->fb_link)
                                        <a href="{{ $teacher->fb_link }}" target="_blank"><i class="fab fa-facebook"></i></a>
                                    @endif
                                    @if ($teacher->ins_link)
                                        <a href="{{ $teacher->ins_link }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                    @endif
                                    @if ($teacher->tw_link)
                                        <a href="{{ $teacher->tw_link }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                    @endif
                                    @if ($teacher->li_link)
                                        <a href="{{ $teacher->li_link }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-sm btn-primary d-inline">Edit</a>

                                <form action="{{ route('teacher.destroy', $teacher->id) }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this teacher?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection

@section('scripts')
<script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
