@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
    List Doctors
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ $clinic->name }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
                /
                List Doctors in Clinic</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            @if (Session::has('done'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('done') }}
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
            @can('addMenu')
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right col-12">
                                <a class="btn btn-primary btn-sm" href="{{ route('doctoradd', $clinic->id) }}">ADD New
                                    Doctor to Clinic</a>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            @endcan
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>image</th>
                                <th>name</th>
                                <th>Department</th>
                                <th>From:TO</th>
                                <th>Days</th>
                                <th>Overview</th>
                                <th>Detection Time</th>
                                <th>Wating Time</th>
                                <th>Sale</th>
                                <th>UPDATE</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctor as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($data->image)
                                        <td><img width="50px" src="{{ asset($data->image) }}" alt="">
                                        </td>
                                    @else
                                        <th></th>
                                    @endif
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->department }}</td>
                                    <td>{{ $data->starttime }}:{{ $data->endtime }}</td>
                                    <td>{{ $data->dayes }}</td>
                                    <td>{{ $data->overview }}</td>
                                    <td>{{ $data->time }} min</td>
                                    <td>{{ $data->wait }} min</td>
                                    <td>{{ $data->sale }}%</td>


                                    {{-- @can('editMenu') --}}
                                    <td>
                                        <a href="{{ route('doctoredit', $data->id) }}">
                                            <button class="btn btn-primary">update</button>
                                        </a>
                                    </td>
                                    {{-- @endcan --}}
                                    {{-- @can('deleteMenu') --}}
                                    <td>
                                        <a href="{{ route('doctordestory', $data->id) }}">
                                            <button class="btn btn-danger">delete</button>
                                        </a>
                                    </td>
                                    {{-- @endcan --}}



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
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
