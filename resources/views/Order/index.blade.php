@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
    Orders
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Orders</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                List Orders</span>
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
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User name</th>
                                <th>Order Name</th>
                                <th>Start Work Time</th>
                                <th>End Work Time</th>
                                <th>Address</th>
                                <th>Delivery Fee</th>
                                <th>Menu</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resturant as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($data->logo)
                                        <td><img width="100px" src="{{ asset("$data->logo") }}"
                                                alt=""></td>
                                    @else
                                        <th></th>
                                    @endif
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->descrption }}</td>
                                    <td>{{ $data->starttime }}</td>
                                    <td>{{ $data->endtime }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>{{ $data->delivery_fee }}</td>

                                    <td>
                                        <a href="{{ route('menulist',$data->id) }}">
                                            <button class="btn btn-primary">Menu</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('resturantedit', $data->id) }}">
                                            <button class="btn btn-primary">Update</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('resturantdestory', $data->id) }}">
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
