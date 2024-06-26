@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Add Category
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">ContactUs</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ List
                ContactUs</span>
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
    <h1 class="text-center mt-3">ContactUs</h1>
    <div class="card-body">
        <h5 class="card-title">Table</h5>
        <table class="table text-center">
            <thead style="color: #1f7a8c">
                <tr>
                    <th scope="col" style="color: #1f7a8c">#</th>
                    <th scope="col">Name User</th>
                    <th scope="col">Email User</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Message</th>
                    <th scope="col">To Place</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($contactus as $date)
                <tr>

                    <td style="color: #1f7a8c">{{ $date->id }}</td>
                    <td>{{ $date->fname }} {{ $date->lname }}</td>
                    <td>{{ $date->email }}</td>
                    <td>{{ $date->phone }}</td>
                    <td>{{ $date->message }}</td>
                    @if ($date->type == 'order')
                        <td>Resturant</td>
                    @else
                        <td>Clinic</td>
                    @endif
                    @can('deleteContactUS')
                        <td>
                            <a href="{{ route('destorecontactus', $date->id) }}">
                                <button class="btn btn-danger">delete</button>
                            </a>
                        </td>
                    @endcan
                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
