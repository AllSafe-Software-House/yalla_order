@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    edit Category of resturant
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"><a href="{{ route('categorylist') }}">Category of Resturant</a></h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Category of Resturant
                edit</span>
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
    <form action="{{ Route('categoryupdate', $category->id) }}" class="d-grid" enctype="multipart/form-data"
        method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="py-2">Category Name:</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Category Name"
                value="{{ $category->name }}">
        </div>
        <div class="mb-3">
            <label for="name" class="py-2">اسم التصنيف:</label>
            <input type="text" id="name" class="form-control" name="name_ar" placeholder="اسم التصنيف"
                value="{{ $category->getTranslation('name','ar') }}">
        </div>
        <div class="mb-3">
            <label for="logo" class="py-2">Category logo:</label>
            <input type="file" id="logo" class="form-control" name="logo">
        </div>
        <input type="hidden"  class="btn btn-primary btn-sm col-12" name="place" value="restaurantes">
        <button type="submit" class="btn btn-primary btn-sm col-12">UPDATE</button>
    </form>
</div>
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
