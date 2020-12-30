@@extends('layouts.backend')

@@section('css')


@@endsection

@@section('content')

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

    @@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @@foreach ($errors->all() as $error)
                <li>@{{ $error }}</li>
            @@endforeach
        </ul>
    </div>
    @@endif


<section class="content">
 <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $name }} list   <a href="{{ '{{' }} route('{{ $LCPName}}.index') }}"> List</a></h3>

              </div>

              <form action="{{ '{{' }} route('{{ $LCPName}}.store') }}" method="POST" @if($multimedia == true) enctype="multipart/form-data" @endif>
                @@csrf
                <div class="card-body">

                 @@include("{{ $LCPName }}.form", ['item' => null])

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
@@endsection
@@section('scripts')

<script>

    @if(!empty($foreigns))
        @foreach($foreigns as $foreign)
        @if($foreign->type == "belongsTo")

        {{$foreign->field}}s = @{!!  json_encode(${{$foreign->field}}s);  {{{ "!!}" }}}

        $(document).ready(function() {
            $("#select2_{{strtolower($foreign->field)}}").select2({
                data:{{strtolower($foreign->field)}}s
            });
        });
        @endif
        @endforeach
    @endif
</script>

@@endsection
