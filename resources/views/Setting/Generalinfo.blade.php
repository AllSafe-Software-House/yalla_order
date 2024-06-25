@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Add GeneralInfo
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">LandingPage</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/GeneralInfo</span>
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
        @if ($generinfo === null)
        <form action="{{ route('generalinfostore') }}" class="d-grid" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="name" value="Instaorder">
            <div class="mb-3">
                <label for="text" class="py-2">Logo:</label>
                <input type="file" id="file" class="form-control" name="logo">
            </div>
            <div class="mb-3">
                <label for="text" class="py-2">Link App Store:</label>
                <input type="text" id="text" class="form-control" name="linkAppStore">
            </div>
            <div class="mb-3">
                <label for="text" class="py-2">Link Google Play:</label>
                <input type="text" id="text" class="form-control" name="linkPlayStore">
            </div>
            <button type="submit"  class="btn btn-primary btn-sm col-12">Add</button>
        </form>
        @else
        <form action="{{ route('generalinfoupdate') }}" class="d-grid" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="name" value="Instaorder">
            <div class="mb-3">
                <label for="text" class="py-2">Logo:</label>
                <span><img src="{{ asset($generinfo->logo) }}" width="60px" alt=""></span>
                <input type="file" id="file" class="form-control" name="logo">
            </div>
            <div class="mb-3">
                <label for="text" class="py-2">Link App Store:</label>
                <input type="text" id="text" class="form-control" name="linkAppStore" value="{{ $generinfo->linkAppStore }}">
            </div>
            <div class="mb-3">
                <label for="text" class="py-2">Link Google Play:</label>
                <input type="text" id="text" class="form-control" name="linkPlayStore" value="{{ $generinfo->linkPlayStore }}">
            </div>
            <button type="submit"  class="btn btn-primary btn-sm col-12">UPdate</button>
        </form>
        @endif
    </div>
</div>
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
