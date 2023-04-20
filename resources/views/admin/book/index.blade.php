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
            <h1 class="m-0">Books List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Books List</li>
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
                        <th>Thumbnail</th>
                        <th>Name</th>
                        <th>Technology</th>
                        <th>Simister</th>
                        <th>Title</th>
                        <th>Regulations</th>
                        <th>Published_by</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>
                                <img src="{{ asset($book->thumbnail) }}" alt="" width="100">
                            </td>
                            <td class="align-middle"><b>{{ $book->name }}</b></td>
                            <td class="align-middle text-nowrap"><b>{{ $book->technology }}</b></td>
                            <td class="align-middle"><b>{{ $book->simister }}</b></td>
                            <td class="align-middle text-nowrap"><b>{{ $book->title }}</b></td>
                            <td class="align-middle"><b>{{ $book->regulations }}</b></td>
                            <td class="align-middle"><b>{{ $book->published_by }}</b></td>
                            <td class="align-middle text-nowrap"><b>{{ $book->price }} TK</b></td>
                            <td class="align-middle"><b>{{ $book->status }}</b></td>
                            <td class="align-middle">
                                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-sm btn-primary d-inline">Edit</a>
                                <form action="{{ route('book.destroy', $book->id) }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this items?');">Delete</button>
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
