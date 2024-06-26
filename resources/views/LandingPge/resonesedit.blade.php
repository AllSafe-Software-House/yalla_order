@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Add Section Two
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">LandingPage</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Why cooperate with us?</span>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/Add Resone</span>
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
        <form action="{{ route('resonupdate',$reson->id) }}" class="d-grid" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="name" value="Resoncooperate">
            <div class="mb-3">
                <label for="text" class="py-2">Image:</label>
                <span><img src="{{ asset($reson->image) }}" width="60px" alt=""></span>
                <input type="file" id="text" class="form-control" name="logo">
            </div>
            <div class="mb-3">
                <label for="text" class="py-2">Title:</label>
                <input type="text" id="text" class="form-control" name="title" value="{{ $reson->title }}">
            </div>
            <div class="mb-3">
                <label for="text" class="py-2">العنوان:</label>
                <input type="text" id="text" class="form-control" name="title_ar" value="{{ $reson->getTranslation('title','ar') }}">
            </div>
            <div class="mb-3">
                <label for="text" class="py-2">Descrition:</label>
                <textarea name="description"  class="form-control" id="" cols="30" rows="10">{{ $reson->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="text" class="py-2">الوصف:</label>
                <textarea name="description_ar"  class="form-control" id="" cols="30" rows="10">{{ $reson->getTranslation('description','ar') }}</textarea>
            </div>
            <button type="submit"  class="btn btn-primary btn-sm col-12">update</button>
        </form>
    </div>
</div>
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
