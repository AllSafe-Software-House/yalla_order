@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
    Resturant
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Resturantes</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                List Resturantes</span>
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
            @if ($errors->any())
                <div class="alert alert-primary">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @can('addResturant')
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right col-12">
                                <a class="btn btn-primary btn-sm" href="{{ route('resturantadd') }}">ADD</a>
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
                                <th>logo</th>
                                <th>name</th>
                                <th>Descrption</th>
                                <th>Start Work Time</th>
                                <th>End Work Time</th>
                                <th>Address</th>
                                <th>Delivery Fee</th>
                                @can('showMenu')
                                    <th>Menu</th>
                                @endcan

                                @can('editResturant')
                                    <th>Update</th>
                                @endcan

                                @can('deleteResturant')
                                    <th>Delete</th>
                                @endcan

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resturant as $data)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    @if ($data->logo)
                                        <td><img width="100px" src="{{ asset("$data->logo") }}" alt=""></td>
                                    @else
                                        <th></th>
                                    @endif
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->descrption }}</td>
                                    <td>{{ $data->starttime }}</td>
                                    <td>{{ $data->endtime }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>{{ $data->delivery_fee }}</td>

                                    @can('showMenu')
                                        <td>
                                            <a href="{{ route('menulist', $data->id) }}">
                                                <button class="btn btn-primary">Menu</button>
                                            </a>
                                        </td>
                                    @endcan
                                    @can('editResturant')
                                        <td>
                                            <a href="{{ route('edit', $data->id) }}">
                                                <button class="btn btn-primary">Update</button>
                                            </a>
                                        </td>
                                    @endcan
                                    @can('deleteResturant')
                                        <td>
                                            <a href="{{ route('destory', $data->id) }}">
                                                <button class="btn btn-danger">delete</button>
                                            </a>
                                        </td>
                                    @endcan


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

</div>

</div>

@endsection
@section('js')
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
