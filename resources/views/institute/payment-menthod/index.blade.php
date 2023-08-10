@extends('institute.layouts.app_in')
@section('styles')
<link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('content')

    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Payment Method List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Payment Method List</li>
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
                        <th>Account Name</th>
                        <th>Account Number</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <img src="{{ asset($payment->logo) }}" alt="" class="rounded border" width="100">
                                    <b class="ml-2">{{ $payment->account_name }}</b>
                                </div>
                            </td>
                            <td>{{ $payment->account_number }}</td>
                            <td>{{ $payment->short_description }}</td>
                            <td>
                                <a href="{{ route('payment-method.edit', $payment->id) }}" class="btn btn-sm btn-primary d-inline">Edit</a>

                                <form action="{{ route('payment-method.destroy', $payment->id) }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this payment method?');">Delete</button>
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

