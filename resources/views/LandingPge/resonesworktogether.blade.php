@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Add Section Two
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">LandingPage</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/How work together?</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            @if (Session::has('done'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('done') }}
                </div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('fail') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-primary">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($resones->count() < 4)
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right col-12">
                                <a class="btn btn-primary btn-sm" href="{{ route('resonstepadd') }}">Add New Step</a>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>logo</th>
                                <th>Title</th>
                                <th>Descrption</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resones as $data)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    @if ($data->image)
                                        <td><img width="100px" src="{{ asset("$data->image") }}" alt=""></td>
                                    @else
                                        <th></th>
                                    @endif
                                    <td>
                                        <span style="color:#FD7E7E">Arabic : </span>{{ $data->getTranslation('title','ar') }}
                                        <hr>
                                        <span style="color:#FD7E7E">English : </span>{{ $data->getTranslation('title','en') }}
                                    </td>
                                    <td>
                                        <span style="color:#FD7E7E">Arabic : </span>{{ $data->getTranslation('description','ar') }}
                                        <hr>
                                        <span style="color:#FD7E7E">English : </span>{{ $data->getTranslation('description','en') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('resonedit', $data->id) }}">
                                            <button class="btn btn-primary">Update</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('resondestory', $data->id) }}">
                                            <button class="btn btn-danger">delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
</div>
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
