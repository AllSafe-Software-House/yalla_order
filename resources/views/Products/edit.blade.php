@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    edit resturant product
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Resturant product</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Resturant
                edit product</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
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
    <form action="{{ Route('productupdate',$product->id) }}" class="d-grid" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="place_id" class="py-2">Resturant Name:</label>
            <select  id="place_id" class="form-control" name="place_id">
                @php
                    $placename = \App\Models\Places::where('id',$product->place_id)->first();
                @endphp
                <option value="{{ $product->place_id }}"> {{ $placename->name }} (current resturant)</option>
                @foreach ($resturant as $data )
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="category_id" class="py-2">Category Name:</label>
            <select  id="category_id" class="form-control" name="category_id">
                @php
                    $categoryname = \App\Models\Category::where('id',$product->category_id)->first();
                @endphp
                <option value="{{ $product->category_id }}"> {{ $categoryname->name }} (current category)</option>
                @foreach ($category as $datacategory )
                    <option value="{{ $datacategory->id }}">{{ $datacategory->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="py-2">Product Name:</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Product Name" value="{{ $product->name }}">
        </div>
        <div class="mb-3">
            <label for="name" class="py-2">اسم المنتج:</label>
            <input type="text" id="name" class="form-control" name="name_ar" placeholder="اسم المنتج" value="{{ $product->getTranslation('name','ar') }}">
        </div>
        <div class="mb-3">
            <label for="descrption" class="py-2">Product Descrption:</label>
            <textarea type="text" id="descrption" class="form-control" name="descrption" cols="4" rows="5" >{{ $product->descrption }}</textarea>
        </div>
        <div class="mb-3">
            <label for="descrption" class="py-2">وصف المنتج:</label>
            <textarea type="text" id="descrption" class="form-control" name="descrption_ar" cols="4" rows="5" >{{ $product->getTranslation('descrption','ar') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="py-2">Product Price:</label>
            <input type="" id="price" class="form-control" name="price" placeholder="Product Price" value="{{ $product->price }}">
        </div>
        <div class="mb-3">
            <label for="logo" class="py-2">Product logo:</label>
            <input type="file" id="logo" class="form-control" name="logo">
        </div>
        <button type="submit"  class="btn btn-primary btn-sm col-12">update</button>
    </form>
</div>
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
