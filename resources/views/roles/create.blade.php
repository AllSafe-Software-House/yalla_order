@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Add Role
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Role</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ADD
                Role</span>
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
                <div class="card-body">
                    <form action="{{ route('rolestore') }}" class="d-grid" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="py-2">Role Name:</label>
                            <input type="text" id="name" class="form-control" name="name"
                                placeholder="user name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Permission</label>
                            @foreach ($permission as $value)
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="checkbox" value="{{ $value->name }}"
                                            aria-label="Checkbox for following text input" name="permission[]">
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox" value="{{ $value->name }}">
                                </div>
                            @endforeach

                        </div>
                        <button type="submit" class="btn btn-primary btn-sm col-12">ADD</button>
                    </form>
                </div>
            </div>
        </div>

    @endsection
    @section('js')
        <!--Internal  Notify js -->
        <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    @endsection
