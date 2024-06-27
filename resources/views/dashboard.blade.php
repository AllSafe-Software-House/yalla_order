@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@section('title')
    Home Dashboard
@endsection
@section('content')
    <div class = "mt-4">
        @php
            $checkrole = auth()->user();
            $adminrole = App\Models\Admin::where('user_id', $checkrole->id)->first();
            $namerole = Spatie\Permission\Models\Role::where('id', $adminrole->role_id)->first();
            $name = $namerole->name;
            $permission = $checkrole->getAllPermissions();
            $searchTerm = 'listTransaction';
            $found = false;
            foreach ($permission as $perm) {
                if ($perm->name == $searchTerm) {
                    $found = true;
                    break;
                }
            }
        @endphp
        @if($found == true && $name != 'SuperAdmin')
            <div class="page-content">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                    @foreach(range(1, 4) as $index)
                        <div class="col">
                            <div class="card radius-10">
                                <div class="card-body" style="background-color:#FD7E7E">
                                    <div class="d-flex align-items-center">
                                        <h5 class="mb-0 text-white"></h5>
                                        <div class="ms-auto">
                                            <i class='bx bx-cart fs-3 text-white'></i>
                                        </div>
                                    </div>
                                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex align-items-center text-white">
                                        <p class="mb-0">Total Services</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row m-6">
                    <div class="col-6">
                        <h1>Daily Order Registrations</h1>
                        <div style="width:100%;">
                            {!! $chartorder->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        @elseif($name == 'SuperAdmin')
            <div class="page-content">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body" style="background-color:#FD7E7E">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0 text-white"></h5>
                                    <div class="ms-auto">
                                        <i class='bx bx-cart fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <p class="mb-0">Total Services</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 ">
                            <div class="card-body" style="background-color:#FD7E7E">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0 text-white"></h5>
                                    <div class="ms-auto">
                                        <i class='bx bx-dollar fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <p class="mb-0">Total Partner</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body" style="background-color:#FD7E7E">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0 text-white"></h5>
                                    <div class="ms-auto">
                                        <i class='bx bx-envelope fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <p class="mb-0">Messages</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body" style="background-color:#FD7E7E">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0 text-white"></h5>
                                    <div class="ms-auto">
                                        <i class='bx bx-envelope fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="progress my-3 bg-light-transparent" style="height:3px;">
                                    <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <p class="mb-0">Messages</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-4">
                    <div class="col-6">
                        <h1>Monthly User Registrations</h1>
                        <div style="width:100%;">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                    <div class="col-6">
                        <h1>Monthly Restaurant Registrations</h1>
                        <div style="width:100%;">
                            {!! $chartres->container() !!}
                        </div>
                    </div>
                </div>
                <div class="row m-4">
                    <div class="col-6">
                        <h1>Monthly Clinic Registrations</h1>
                        <div style="width:100%;">
                            {!! $chartclinic->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection

@section('js')
    @if($adminrole->place_id !== null)
        <script src="{{ $chartorder->cdn() }}"></script>
        {{ $chartorder->script() }}
    @elseif($name == 'SuperAdmin')
        <script src="{{ $chart->cdn() }}"></script>
        <script src="{{ $chartres->cdn() }}"></script>
        <script src="{{ $chartclinic->cdn() }}"></script>
        {{ $chart->script() }}
        {{ $chartres->script() }}
        {{ $chartclinic->script() }}
    @endif
@endsection
