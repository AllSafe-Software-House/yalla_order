@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Best Doctores
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">LandingPage</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/<a href="{{ route('bestdoctorlist') }}">Best Doctores</a> </span>
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
            @if ($bestdoctore->count() < 6)
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right col-12">
                                <a class="btn btn-primary btn-sm" href="{{ route('bestdoctoradd') }}">Add New Doctor</a>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            @endif
            <h6 class="m-4"><span style="color: #FD7E7E">Note:</span>You Can ADD For 6 Doctor</h6>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>image</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bestdoctore as $data)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset($data->doctore->image) }}" width="40px" alt=""></td>
                                    <td>
                                        <span style="color:#FD7E7E">Arabic : </span>{{ $data->doctore->getTranslation('name','ar') }}
                                        <hr>
                                        <span style="color:#FD7E7E">English : </span>{{ $data->doctore->getTranslation('name','en') }}
                                    </td>
                                    <td>
                                        <span style="color:#FD7E7E">Arabic : </span>{{ $data->doctore->getTranslation('department','ar') }}
                                        <hr>
                                        <span style="color:#FD7E7E">English : </span>{{ $data->doctore->getTranslation('department','en') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('bestdoctoredit', $data->id) }}">
                                            <button class="btn btn-primary">Update</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('bestdoctordestory', $data->id) }}">
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
