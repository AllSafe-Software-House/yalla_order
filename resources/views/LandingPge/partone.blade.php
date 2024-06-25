@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Add Section One
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">LandingPage Home</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Part One Food Page</span>
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
        @if ($partone === null)
        <form action="{{ route('partonestore') }}" class="d-grid" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="name" value="PartOne">
            <div class="mb-3">
                <label for="text" class="py-2">Title:</label>
                <input type="text" id="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="text" class="py-2">العنوان:</label>
                <input type="text" id="text" class="form-control" name="title_ar">
            </div>
            <input type="hidden" id="text" class="form-control" name="description" value="partone">
            <input type="hidden" id="text" class="form-control" name="description_ar" value="partone">
            <button type="submit"  class="btn btn-primary btn-sm col-12">Add</button>
        </form>
        @else
        <form action="{{ route('partoneupdate') }}" class="d-grid" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="name" value="PartOne">
            <div class="mb-3">
                <label for="text" class="py-2">Title:</label>
                <input type="text" id="text" class="form-control" name="title" value="{{ $partone->title }}">
            </div>
            <div class="mb-3">
                <label for="text" class="py-2">العنوان:</label>
                <input type="text" id="text" class="form-control" name="title_ar" value="{{ $partone->getTranslation('title','ar') }}">
            </div>
            <input type="hidden" id="text" class="form-control" name="description" value="partone">
            <input type="hidden" id="text" class="form-control" name="description_ar" value="partone">
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
