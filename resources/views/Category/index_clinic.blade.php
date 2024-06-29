@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
    Category of Clinic
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"><a href="{{ route('cliniclist') }}" style="color: #FD7E7E">Category of clinic</a></h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                List of Clinic</span>
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
            @can('addCategory')
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right col-12">
                                <a class="btn btn-primary btn-sm" href="{{ route('categoryclinicadd') }}">Add New Category</a>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            @endcan
            <div class="card-body">
                <form action="{{route('filtercategory')}}" class="d-grid" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-4">
                            <label for="name" class="py-2">Filter By Category Name:</label>
                            <input type="text" id="name" class="form-control" name="categoryclinic" placeholder="Category Name">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger d-flex justify-content-center">Filter</button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>logo</th>
                                <th>name</th>
                                @can('editClinicCategory')
                                    <th>Update</th>
                                @endcan
                                @can('deleteClinicCategory')
                                    <th>Delete</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($data->logo)
                                        <td><img width="50px" src="{{ asset("$data->logo") }}" alt=""></td>
                                    @else
                                        <th></th>
                                    @endif
                                    <td>
                                        <span style="color:#FD7E7E">Arabic : </span>{{ $data->getTranslation('name','ar') }}
                                        <hr>
                                        <span style="color:#FD7E7E">English : </span>{{ $data->getTranslation('name','en') }}
                                    </td>

                                    @can('editClinicCategory')
                                        <td>
                                            <a href="{{ route('categoryedit', $data->id) }}">
                                                <button class="btn btn-primary">Update</button>
                                            </a>
                                        </td>
                                    @endcan
                                    @can('deleteClinicCategory')
                                        <td>
                                            <a href="{{ route('categorydestory', $data->id) }}">
                                                <button class="btn btn-danger">delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endcan
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
