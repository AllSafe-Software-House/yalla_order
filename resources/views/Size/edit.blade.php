@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    edit Size
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"><a href="{{ route('sizelist') }}" style="color: #9B4999">Size</a></h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Size
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
    <form action="{{ route('sizeupdate' , $size->id) }}" class="d-grid" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="place_id" class="py-2">Resturant:</label>
            <select  id="place_id" class="form-control" name="place_id">
                @php
                    $placename = \App\Models\Places::where('id',$size->places_id)->first();
                @endphp
                <option value="{{ $size->places_id }}"> {{ $placename->name }} (current resturant)</option>
                @foreach ($resturant as $data )
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="size" class="py-2">Size Name:</label>
            <input type="text" id="size" class="form-control" name="size" placeholder="Size Name" value="{{ $size->size }}">
        </div>
        <div class="mb-3">
            <label for="size" class="py-2">الحجم:</label>
            <input type="text" id="size" class="form-control" name="size_ar" placeholder="الحجم" value="{{ $size->getTranslation('size','ar') }}">
        </div>
        <div class="mb-3">
            <label for="price" class="py-2">Price:</label>
            <input type="text" id="price" class="form-control" name="price" value="{{ $size->price }}">
        </div>
        <button type="submit"  class="btn btn-primary btn-sm col-12">UPDATE</button>
    </form>
</div>
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
