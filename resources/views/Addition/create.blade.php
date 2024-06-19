@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Add Addtion
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Addtion</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ADD Addtion</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
@if (Session::has('done'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('done') }}
    </div>
@endif
<div class="card">
    @if ($errors->any())
        <div class="alert alert-primary">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
        <form action="{{ Route('addtionstore') }}" class="d-grid" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-3">
                <label for="place_id" class="py-2">Resturant Name:</label>
                <select  id="place_id" class="form-control" name="place_id">
                    @foreach ($resturant as $data )
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="type" class="py-2">Type Addtion:</label>
                <select  id="type" class="form-control" name="type">
                    <option value="item">Item</option>
                    <option value="sauci">Sauci</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="py-2">Addtion Name:</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Addtion Name">
            </div>
            <div class="mb-3">
                <label for="name" class="py-2">Addtion Name:</label>
                <input type="text" id="name" class="form-control" name="name_ar" placeholder="Addtion Name">
            </div>
            <div class="mb-3">
                <label for="price" class="py-2">Addtion Price:</label>
                <input type="string" id="price" class="form-control" name="price" placeholder="Addtion Price">
            </div>
            <button type="submit"  class="btn btn-primary btn-sm col-12">ADD</button>
        </form>
    </div>
</div>
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>

@endsection
