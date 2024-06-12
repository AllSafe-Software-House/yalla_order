
@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    /* Style for success alert */

@section('title')
    Reservation
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Reservation</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                List Reservation</span>
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
            @empty($reservation->isEmpty())
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User name</th>
                                    <th>User phone</th>
                                    <th>Doctor name</th>
                                    <th>Clinic name</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th>Fees</th>
                                    <th>Status</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservation as $data)
                                    <tr>
                                        <td>{{ $loop->iteration + ($reservation->currentPage() - 1) * $reservation->perPage() }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ optional($data->doctore)->name }}</td>
                                        <td>{{ optional($data->place)->name }}</td>
                                        <td>{{ $data->day_booking }}</td>
                                        <td>{{ $data->time_booking }}</td>
                                        <td>{{ $data->totalAfterSale }}</td>
                                        <td>
                                            @if ($data->status == '0')
                                                <button class="btn btn-primary rounded-circle">waiting</button>
                                            @else
                                                <button class="btn btn-primary rounded-circle">confirm</button>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('transactiondelete', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this reservation?');">
                                                @csrf
                                                <button class="btn btn-danger" type="submit">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> 
                        </table>
                    </div>
                </div>
            @else
                <div class="card-body">
                    <p>No reservations found.</p>
                </div>
            @endempty
            <tfooter>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                            Showing {{ $reservation->firstItem() }} to {{ $reservation->lastItem() }} of {{ $reservation->total() }} entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        {{ $reservation->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </tfooter>
        </div>
    </div>
</div>

@endsection
@section('js')
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
