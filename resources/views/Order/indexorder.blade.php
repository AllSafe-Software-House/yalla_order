@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
    Order
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Orders</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                List Orders</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            @if (Session::has('done'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('done') }}
                </div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('fail') }}
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
                                <th>User Name</th>
                                <th>User phone</th>
                                <th>Oder Number</th>
                                <th>Confirm</th>
                                <th>Redy</th>
                                <th>Picked Up</th>
                                <th>Delivery</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $data)
                                <tr>
                                    <td>{{ $loop->iteration + ($order->currentPage() - 1) * $order->perPage() }}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->user->phone }}</td>
                                    <td>{{ $data->numberOrder }}</td>

                                    <td>
                                        @if ($trackorder = $trackorders[$loop->index] ?? null)
                                            @if ($trackorders[$loop->index]->accept_statue == '1')
                                                <button class="btn btn-danger">OK</button>
                                            @else
                                                <a href="{{ route('trackconfirm', $data->id) }}">
                                                    <button class="btn btn-danger">confirm</button>
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{ route('trackconfirm', $data->id) }}">
                                                <button class="btn btn-danger">confirm</button>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($trackorder = $trackorders[$loop->index] ?? null)
                                            @if ($trackorders[$loop->index]->ready_statue == '1')
                                                <button class="btn btn-primary">OK</button>
                                            @else
                                                <a href="{{ route('trackready', $data->id) }}">
                                                    <button class="btn btn-primary">redy</button>
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{ route('trackready', $data->id) }}">
                                                <button class="btn btn-primary">redy</button>
                                            </a>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($trackorder = $trackorders[$loop->index] ?? null)
                                            @if ($trackorders[$loop->index]->pickup_statue == '1')
                                                <button class="btn btn-danger">OK</button>
                                            @else
                                                <a href="{{ route('trackpiked', $data->id) }}">
                                                    <button class="btn btn-danger">picked up</button>
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{ route('trackpiked', $data->id) }}">
                                                <button class="btn btn-danger">picked up</button>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($trackorder = $trackorders[$loop->index] ?? null)
                                            @if ($trackorders[$loop->index]->deliverd_statue == '1')
                                                <button class="btn btn-primary">OK</button>
                                            @else
                                                <a href="{{ route('trackdelivery', $data->id) }}">
                                                    <button class="btn btn-primary">Delivery</button>
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{ route('trackdelivery', $data->id) }}">
                                                <button class="btn btn-primary">Delivery</button>
                                            </a>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                                        Showing {{ $order->firstItem() }} to {{ $order->lastItem() }} of {{ $order->total() }} entries
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    {{ $order->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
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
