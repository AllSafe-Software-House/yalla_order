@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    edit doctor data
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Clinic</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/doctor data
                edit</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-primary">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('done'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('done') }}
    </div>
@endif

<div class="card-body">
    <form action="{{ Route('doctorupdate', $doctors->id) }}" class="d-grid" enctype="multipart/form-data"
        method="POST">
        @csrf
        <div class="mb-3">
            <label for="place_id" class="py-2">Clinic Name:</label>
            <input type="text" id="place" class="form-control" name="place" value="{{ $clinic->name }}"
                readonly>
            <input type="hidden" id="place_id" class="form-control" name="place_id" value="{{ $clinic->id }}">
            <input type="hidden" id="price_fees" class="form-control" name="price_fees"
                value="{{ $clinic->delivery_fee }}">
        </div>
        <div class="row">
            <div class="mb-3 col-4">
                <label for="name" class="py-2">Doctor Name:</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Doctor name"
                    value="{{ $doctors->name }}">
            </div>
            <div class="mb-3 col-4">
                <label for="department" class="py-2">Doctor Department:</label>
                <input type="text" id="department" class="form-control" name="department"
                    placeholder="Doctor department" value="{{ $doctors->department }}">
            </div>
            <div class="mb-3 col-4">
                <label for="logo" class="py-2">Doctor image:</label>
                <input type="file" id="logo" class="form-control" name="logo">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-4">
                <label for="name" class="py-2">اسم الدكتور:</label>
                <input type="text" id="name" class="form-control" name="name_ar" placeholder="اسم الدكتور"
                    value="{{ $doctors->getTranslation('name','ar') }}">
            </div>
            <div class="mb-3 col-4">
                <label for="department" class="py-2">قسم الدكتور:</label>
                <input type="text" id="department" class="form-control" name="department_ar"
                    placeholder="قسم الدكتور" value="{{ $doctors->getTranslation('department','ar') }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="overview" class="py-2">Doctor Overview:</label>
            <textarea type="text" id="overview" class="form-control" name="overview" placeholder="Doctor overview">{{ $doctors->overview }}</textarea>
        </div>
        <div class="mb-3">
            <label for="overview" class="py-2">نبذه مختصره عن الدكتور:</label>
            <textarea type="text" id="overview" class="form-control" name="overview_ar" placeholder="Doctor overview">{{ $doctors->getTranslation('overview','ar') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="days" class="py-2">Days:</label><span>{{ $doctors->dayes }}</span>
            <select id="days" class="form-control" name="days[]" multiple>
                <option value="Sat">Sat</option>
                <option value="Sun">Sun</option>
                <option value="Mon">Mon</option>
                <option value="Tu">Tu</option>
                <option value="We">We</option>
                <option value="Th">Th</option>
                <option value="Fri">Fri</option>
            </select>
        </div>
        <div class="row mb-3">
            <div class="mb-3 col-6">
                <label for="starttime" class="py-2">Doctor Start Time:</label>
                <input type="time" id="starttime" class="form-control" name="starttime"
                    value="{{ $doctors->starttime }}">
            </div>
            <div class="mb-3 col-6">
                <label for="endtime" class="py-2">Doctor End Time:</label>
                <input type="time" id="endtime" class="form-control" name="endtime"
                    value="{{ $doctors->endtime }}">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-4">
                <label for="time" class="py-2">Doctor Time:(min)</label>
                <input type="number" id="time" class="form-control" name="time" placeholder="20min"
                    value="{{ $doctors->time }}">
            </div>
            <div class="mb-3 col-4">
                <label for="wait" class="py-2">Doctor Watting Time:(min)</label>
                <input type="number" id="wait" class="form-control" name="wait" placeholder="20min" value="{{ $doctors->wait }}">
            </div>
            <div class="mb-3 col-4">
                <label for="sale" class="py-2">Fees Sale :(%)</label>
                <input type="number" id="sale" class="form-control" name="sale" placeholder="10%">
            </div>
        </div>

        <input type="submit" class="btn btn-primary btn-sm col-12" value="UPdate Doctor data">
    </form>
</div>
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
