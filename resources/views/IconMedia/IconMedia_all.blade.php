@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Best Doctores
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Add LInk social media</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/LIST</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('iconmediaadd') }}" class="btn btn-primary">{{ trans('Add Icon Media') }}</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($iconmedia as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{$item->link}}
                                    </td>
                                    <td>
                                        <a href="{{ route('iconmediaedit', $item->id) }}" class="btn"
                                            style="background-image: linear-gradient(#FD7E7E, #9d179b); color:aliceblue">Update</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('iconmediadestory', $item->id) }}" id="delete"
                                            class="btn" style="background-image: linear-gradient(#FD7E7E, #FD7E7E); color:aliceblue">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
