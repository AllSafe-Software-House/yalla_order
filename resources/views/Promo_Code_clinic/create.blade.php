@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Add Promo Code for clinic
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Promo Code</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ADD Promo Code for clinic</span>
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
        <form action="{{ route('promocodestore') }}" class="d-grid" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-3">
                <label for="place_id" class="py-2">Clinic:</label>
                <select  id="place_id" class="form-control" name="place_id">
                    @foreach ($resturant as $data )
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="py-2">Promo Code Name:</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="promo code Name">
            </div>
            <div class="mb-3">
                <label for="sale" class="py-2">Promo Code Sale:</label>
                <input type="number" id="sale" class="form-control" name="sale">
            </div>
            <div class="mb-3">
                <label for="starttime" class="py-2">Promo Code StartTime:</label>
                <input type="date" id="starttime" class="form-control" name="starttime">
            </div>
            <div class="mb-3">
                <label for="endtime" class="py-2">Promo Code EndTime:</label>
                <input type="date" id="endtime" class="form-control" name="endtime">
            </div>
            <input type="hidden" id="type" class="form-control" name="type" value="clinic">
            <button type="submit"  class="btn btn-primary btn-sm col-12">ADD</button>
        </form>
    </div>
</div>
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
