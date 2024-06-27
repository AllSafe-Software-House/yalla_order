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
            <h4 class="content-title mb-0 my-auto">Commission Percentage</h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">

    <!--breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($commision)
                                <form method="post" action="{{route('commisionupdate')}}">
                                    @csrf
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{session('status')}}
                                        </div>
                                    @elseif (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{session('error')}}
                                        </div>
                                    @endif

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Show User LIke this</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control @error('commision') is-invalid @enderror"
                                            value="عمولة {{ $commision->commision }}% لمدة {{ $commision->day_num }} يومًا!" readonly/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Commission Percentage (%)</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="number" name="commision" class="form-control @error('commision') is-invalid @enderror" id="current_password"
                                            placeholder="20" value="{{ $commision->commision }}" />
                                            @error('commision')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Day Number</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="number" name="day_num" class="form-control @error('day_num') is-invalid @enderror"  id="day_num"
                                            placeholder="60"  value="{{ $commision->day_num }}"/>
                                            @error('day_num')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form method="post" action="{{route('commisionstore')}}">
                                    @csrf
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{session('status')}}
                                        </div>
                                    @elseif (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{session('error')}}
                                        </div>
                                    @endif

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Show User LIke this</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control @error('commision') is-invalid @enderror"
                                            value="عمولة 20% لمدة 60 يومًا!" readonly/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Commission Percentage (%)</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="number" name="commision" class="form-control @error('commision') is-invalid @enderror" id="current_password" placeholder="20" />
                                            @error('commision')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Day Number</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="number" name="day_num" class="form-control @error('day_num') is-invalid @enderror"  id="day_num" placeholder="60" />
                                            @error('day_num')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Add" />
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
