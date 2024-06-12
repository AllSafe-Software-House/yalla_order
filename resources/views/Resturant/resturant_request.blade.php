@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
@section('title')
    Resturants Requests
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Resturantes</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                List Resturantes Requests</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            @if (Session::has('done'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('done') }}
                </div>
            @endif
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
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <!--<th>logo</th>-->
                                <th>name</th>
                                <th>email</th>
                                <th>mobile</th>
                                <th>type</th>
                                <th>actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resturant as $data)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <!--@if ($data->logo)-->
                                    <!--    <td><img width="100px" src="{{ asset("$data->logo") }}" alt=""></td>-->
                                    <!--@else-->
                                    <!--    <th></th>-->
                                    <!--@endif-->
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->mobile }}</td>
                                    <td>{{ $data->type }}</td>
                                    
                                    
                                    
                                    <td>
                                        <!--<a class="align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"-->
                                        <!--    role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
                                        <!--    <i class='bx bx-dots-vertical-rounded'></i>-->
                                        <!--</a>-->
                                        <!--<ul class="dropdown-menu dropdown-menu-end">-->
                                            <!--<li>-->
                                                <form action="{{ route('resturant_request.destroy', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">
                                                        <i class='bx bx-trash'></i><span>{{ __('delete') }}</span>
                                                    </button>
                                                </form>
                                            <!--</li>-->
                                        <!--</ul>-->
                                    </td>
                                    


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $resturant->links('pagination::bootstrap-4')}}
                    
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
</div>

</div>

</div>

@endsection
@section('js')
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

<!-- Bootstrap JS (including Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
@endsection
