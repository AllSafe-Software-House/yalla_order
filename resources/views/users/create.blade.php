@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Add Admin
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Admin</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ADD Admin</span>
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
        <h5>Admin for Resturant</h5>
        <div class="card-body">
            <form action="{{ route('usersstore') }}" class="d-grid" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="place_id" class="py-2">Resturant:</label>
                    <select  id="place_id" class="form-control" name="place_id">
                        @foreach ($resturant as $data )
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="py-2">User Name:</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="user name">
                </div>
                <div class="mb-3">
                    <label for="email" class="py-2">User Email:</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="user email">
                </div>
                <div class="mb-3">
                    <label for="password" class="py-2">User password:</label>
                    <input type="password" id="password" class="form-control" name="password"
                        placeholder="user password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select id="role_id" class="form-control " name="roles_name">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm col-12">ADD</button>
            </form>
        </div>
    </div>

    <div class="card-body">
        <h5>Admin for Clinic</h5>
        <div class="card-body">
            <form action="{{ route('usersstore') }}" class="d-grid" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="place_id" class="py-2">clinic:</label>
                    <select  id="place_id" class="form-control" name="place_id">
                        @foreach ($clinic as $data )
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="py-2">User Name:</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="user name">
                </div>
                <div class="mb-3">
                    <label for="email" class="py-2">User Email:</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="user email">
                </div>
                <div class="mb-3">
                    <label for="password" class="py-2">User password:</label>
                    <input type="password" id="password" class="form-control" name="password"
                        placeholder="user password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select id="place_id" class="form-control " name="roles_name[]" multiple>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm col-12">ADD</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
