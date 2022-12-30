@extends('Layout.admin')

@section('header')
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Project Add</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
    </head>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Project Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Project Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">General</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/admin/project/store" id="edit-form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Project Name</label>
                            <input type="text" id="inputName" name="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Project Description</label>
                            <textarea id="inputDescription" name="inputDescription" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select id="inputStatus" name="inputStatus" class="form-control custom-select">
                                @foreach ($status as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">Client Company</label>
                            <input type="text" id="inputClientCompany" name="inputClientCompany" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Project Leader</label>
                            <input type="text" id="inputProjectLeader" name="inputProjectLeader" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-secondary">Cancel</a>
                                <button type="submit" value="Create new Project" class="btn btn-success float-right">Create new Project</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
@endsection
