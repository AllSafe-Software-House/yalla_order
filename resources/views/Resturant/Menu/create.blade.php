@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Add Resturant
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Resturants</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ADD Resturant</span>
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
        <form action="{{ Route('menustore') }}" class="d-grid" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-3">
                <label for="place_id" class="py-2">Resturant Name:</label>
                <input type="text" id="place" class="form-control" name="place" value="{{ $resturant->name }}" readonly>
                <input type="hidden" id="place_id" class="form-control" name="place_id" value="{{ $resturant->id }}" >
            </div>
            <div class="mb-3">
                <label for="product_id" class="py-2">Product:</label>
                <select  id="product_id" class="form-control" name="product_id">
                    @foreach ($product as $data )
                       <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="sale" class="py-2">Product Sale:</label>
                <input type="number" id="sale" class="form-control" name="sale">
            </div>
            <input type="submit"  class="btn btn-primary btn-sm col-12"  value="Add">
        </form>
    </div>
</div>
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
