@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
    Resturant Menue
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ $resturant->name }}</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                List Product in Menue</span>
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
                                <a class="btn btn-primary btn-sm" href="{{ route('menuadd', $resturant->id) }}">ADD New
                                    Product to menu</a>
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
                                <th>Price</th>
                                <th>Sale</th>
                                <th>UPDATE</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menue as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($data->product->image)
                                        <td><img width="50px" src="{{ asset($data->product->image) }}" alt="">
                                        </td>
                                    @else
                                        <th></th>
                                    @endif
                                    <td>{{ $data->product->name }}</td>
                                    <td>{{ $data->product->descrption }}</td>
                                    <td>{{ $data->product->price }}</td>
                                    <td>{{ $data->sale }}%</td>

                                    @can('editMenu')
                                        <td>
                                            <a href="{{ route('menuedit', $data->id) }}">
                                                <button class="btn btn-primary">update</button>
                                            </a>
                                        </td>
                                    @endcan
                                    @can('deleteMenu')
                                        <td>
                                            <a href="{{ route('menudestory', $data->id) }}">
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
