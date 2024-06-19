@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    edit Addtion
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Addtion</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Addtion
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
    <form action="{{ Route('addtionupdate', $addtion->id) }}" class="d-grid" enctype="multipart/form-data"
        method="POST">
        @csrf
        <div class="mb-3">
            <label for="place_id" class="py-2">Resturant Name:</label>
            <select  id="place_id" class="form-control" name="place_id">
                @php
                    $placename = \App\Models\Places::where('id',$addtion->place_id)->first();
                @endphp
                <option value="{{ $addtion->place_id }}">{{ $placename->name }} (current resturant)</option>
                @foreach ($resturant as $data )
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type" class="py-2">Type Addtion:</label>
            <select id="type" class="form-control" name="type">
                <option value="{{ $addtion->type }}">{{ $addtion->type }} (current type)</option>
                <option value="item">Item</option>
                <option value="sauci">Sauci</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="py-2">Addtion Name:</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Addtion Name"
                value="{{ $addtion->name }}">
        </div>
        <div class="mb-3">
            <label for="name" class="py-2">اسم الاضافه:</label>
            <input type="text" id="name" class="form-control" name="name_ar" placeholder="Addtion Name"
                value="{{ $addtion->getTranslation('name','ar') }}">
        </div>
        <div class="mb-3">
            <label for="price" class="py-2">Addtion Price:</label>
            <input type="string" id="price" class="form-control" name="price" placeholder="Addtion Price"
                value="{{ $addtion->price }}">
        </div>
        <button type="submit" class="btn btn-primary btn-sm col-12">UPDATE</button>
    </form>
</div>
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
