@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Status The Place
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Status The Place</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Change The Status</span>
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
        
        <form action="{{ route('change_status') }}" class="d-grid" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="id" value="{{ $place->id }}">
            </div>
            <div class="mb-3">
                <label for="starttime" class="py-2">Name:</label>
                <input type="text" class="form-control" name="starttime" value="{{ $place->name }}" readonly>
            </div>
            <div class="mb-3">
                <label for="starttime" class="py-2">Place StartTime:</label>
                <input type="date" id="starttime" class="form-control" value="{{ $place->starttime }}" readonly>
            </div>
            <div class="mb-3">
                <label for="endtime" class="py-2">Place EndTime:</label>
                <input type="date" id="endtime" class="form-control" value="{{ $place->endtime }}" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="py-2">Status:</label>
                <select name="status" id=""class="form-control">
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                </select>
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
