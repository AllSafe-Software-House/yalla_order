@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Add Setting
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Setting</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ADD Aboutus</span>
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
        @if ($aboutus === null)
        <form action="{{ route('aboutusstore') }}" class="d-grid" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" id="size" class="form-control" name="title" value="About US">
            <input type="hidden" id="size" class="form-control" name="title_ar" value="نبذه عن">
                <div class="mb-3">
                    <label for="text" class="py-2">Text Show in About US:</label>
                    <textarea id="text" class="form-control" name="text" cols="5">not writte text show in about us yet</textarea>
                </div>
                <div class="mb-3">
                    <label for="text" class="py-2">نبذه عن الابليكشن :</label>
                    <textarea id="text" class="form-control" name="text_ar" cols="5">not writte text show in about us yet</textarea>
                </div>
            <button type="submit"  class="btn btn-primary btn-sm col-12">Save</button>
        </form>
        @else
        <form action="{{ route('aboutusupdate') }}" class="d-grid" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" id="size" class="form-control" name="title" value="About US">
            <input type="hidden" id="size" class="form-control" name="title_ar" value="نبذه عن">
                <div class="mb-3">
                    <label for="text" class="py-2">Text Show in About US:</label>
                    <textarea id="text" class="form-control" name="text" cols="5">{{ $aboutus->text }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="text" class="py-2">نبذه عن الابليكشن :</label>
                    <textarea id="text" class="form-control" name="text_ar" cols="5">{{ $aboutus->getTranslation('text','ar') }}</textarea>
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
