@extends('layouts.backend')

@section('css')

<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Roles </h2>
                        <h1 class="float-right">
                            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                                href="{{ route('roles.create') }}">Ajouter</a>
                        </h1>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="indexTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                                                                                            <th>name</th>
                                    
                                                                                                            <th>slug</th>
                                    
                                                                        <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach($items as $item)
                                <tr>
                                                                                                            <td> {{ $item->name }} </td>
                                                                                                                                                <td> {{ $item->slug }} </td>
                                                                                                            <td>
                                        <div class="btn-group">
                                            <a href="{{ route('roles.edit', $item->id) }}"
                                                class="btn btn-info"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('roles.destroy', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-info"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')

<script src="{{ asset('/assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
    $(function () {

      $('#indexTable').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>

@endsection
