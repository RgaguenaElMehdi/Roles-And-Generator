@extends('layouts.backend')

@section('css')


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

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


<section class="content">
 <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Role list   <a href="{{ route('roles.index') }}"> List</a></h3>

              </div>

              <form action="{{ route('roles.store') }}" method="POST" >
                @csrf
                <div class="card-body">

                 @include("roles.form", ['item' => null])

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>

            </div>
          </div>
        </div>
 </div>
</section>
@endsection
@section('scripts')

<script>

    </script>

@endsection
