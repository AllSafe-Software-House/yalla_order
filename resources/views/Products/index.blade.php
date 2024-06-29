@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
    Products
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Products</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                List Products</span>
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
            @can('addProduct')
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right col-12">
                                <a class="btn btn-primary btn-sm" href="{{ route('productadd') }}">Add New Product</a>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            @endcan
            <div class="card-body">
                <form action="{{route('filterationproduct')}}" class="d-grid" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        @php
                            $checkrole = auth()->user();
                            $name = $checkrole->roles->pluck('name');
                            $permission = $checkrole->getAllPermissions();
                            $searchTerm = 'showProduct';
                            $found = false;
                            foreach ($permission as $perm) {
                                if ($perm->name == $searchTerm) {
                                    $found = true;
                                    break;
                                }
                            }
                        @endphp
                        @if($found == true && $name->contains('SuperAdmin'))
                            <div class="mb-3 col-4">
                                <label for="name" class="py-2">Filter By Place Name:</label>
                                <input type="text" id="name" class="form-control" name="placename" placeholder="Place Name">
                            </div>
                        @endif
                        <div class="mb-3 col-4">
                            <label for="name" class="py-2">Filter By Product Name:</label>
                            <input type="text" id="name" class="form-control" name="productname" placeholder="Product Name">
                        </div>
                        <div class="mb-3 col-4">
                            <label for="name" class="py-2">Filter By Product Category:</label>
                            <input type="text" id="name" class="form-control" name="productcategory" placeholder="Product category">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger d-flex justify-content-center">Filter</button>
                </form>
            </div>
            <hr>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>logo</th>
                                <th>Name</th>
                                <th>Descrption</th>
                                <th>Price</th>
                                <th>Category Name</th>
                                <th>Resturant Name</th>
                                <th>Best Sale</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($data->image)
                                        <td><img width="50px" src="{{ asset("$data->image") }}" alt=""></td>
                                    @else
                                        <th></th>
                                    @endif
                                    <td>
                                        <span style="color:#FD7E7E">Arabic : </span>{{ $data->getTranslation('name','ar') }}
                                        <hr>
                                        <span style="color:#FD7E7E">English : </span>{{ $data->getTranslation('name','en') }}
                                    </td>
                                    <td>
                                        <span style="color:#FD7E7E">Arabic : </span>{{ $data->getTranslation('descrption','ar') }}
                                        <hr>
                                        <span style="color:#FD7E7E">English : </span>{{ $data->getTranslation('descrption','en') }}
                                    </td>
                                    <td>{{ $data->price }}</td>
                                    <td>
                                        <span style="color:#FD7E7E">Arabic : </span>{{ $data->category->getTranslation('name','ar') }}
                                        <hr>
                                        <span style="color:#FD7E7E">English : </span>{{ $data->category->getTranslation('name','en') }}
                                    </td>
                                    <td>
                                        <span style="color:#FD7E7E">Arabic : </span>{{ $data->places->getTranslation('name','ar') }}
                                        <hr>
                                        <span style="color:#FD7E7E">English : </span>{{ $data->places->getTranslation('name','en') }}
                                    </td>
                                    <td><button class="btn btn-primary" style="border-radius: 50%">not</button></td>
                                    @can('editProduct')
                                        <td>
                                            <a href="{{ route('productedit', $data->id) }}">
                                                <button class="btn btn-primary">Update</button>
                                            </a>
                                        </td>
                                    @endcan
                                    @can('deleteProduct')
                                        <td>
                                            <a href="{{ route('productdestory', $data->id) }}">
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
