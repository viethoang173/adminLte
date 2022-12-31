
@extends('Layout.admin')

@section('header')
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Projects</title>

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
                        <h1>Projects</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="breadcrumb float-sm-right">
                            <form method="get" action="{{route('project.search')}}" class="form-inline" style="margin-right: 30px;">
                                <div class="input-group">
                                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-sidebar" style="border: 1px solid #ced4da">
                                            <i class="fas fa-search fa-fw"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <a class="btn btn-danger" href="/admin/project/add">Project Add</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Projects</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                STT
                            </th>
                            <th style="width: 15%">
                                Project Name
                            </th>
                            <th style="width: 25%">
                                Project Description
                            </th>
                            <th style="width: 19%">
                                Project Leader
                            </th>
                            <th style="width: 15%">
                                Client Company
                            </th>
                            <th style="width: 10%" >Status
                            </th>
                            <th style="width: 15%" >Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;?>
                            @foreach($listProject as $project)
                                <tr>
                                    <td class="text-center">
                                        {{$i++}}
                                    </td>
                                    <td>
                                        <div>{{$project->name}}</div>
                                        <small>
                                            {{$project->created_at}}
                                        </small>
                                    </td>
                                    <td>
                                        {{$project->description}}
                                    </td>
                                    <td>
                                        {{$project->leader}}
                                    </td>
                                    <td>
                                        {{$project->client_company}}
                                    </td>
                                    <td class="project-state text-left">
                                        <span class="badge badge-success">{{$project->project_status->name}}</span>
                                    </td>
                                    <td class="project-actions">
                                        <a class="btn btn-primary btn-sm" href="/admin/project/detail">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="/admin/project/edit/{{$project->id}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>

                                            <form method="post" onsubmit="return confirm('Are you sure?')" action="/admin/project/delete/{{$project->id}}" >
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" href="#">
                                                    <i class="fas fa-trash"></i>Delete
                                                </button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

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
