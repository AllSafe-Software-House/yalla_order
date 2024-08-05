@extends('layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@section('title')
    CashBack Setting
@stop


@endsection
@section('page-header')



@endsection


@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('cashback-settings.update') }}" method="POST">
                                @csrf
                                @method('PUT')



                                <div class="mb-3 row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Cashback Enabled</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="checkbox" name="cashback_enabled" value="{{ $settings['cashback_enabled'] }}" class="form-control @error('cashback_enabled') is-invalid @enderror" id="cashback_enabled" placeholder="cashback enabled" />
                                        @error('cashback_enabled')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div>
                                    <label for="cashback_amount">Cashback Amount:</label>
                                    <input type="number" step="0.01" id="cashback_amount" name="cashback_amount" value="{{ $settings['cashback_amount'] }}">
                                </div> --}}

                                <div class="mb-3 row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Cashback Amount:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="number" name="cashback_amount"  value="{{ $settings['cashback_amount'] }}" class="form-control @error('cashback_amount') is-invalid @enderror" id="cashback_amount" placeholder="cashback amount" />
                                        @error('cashback_amount')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div>
                                    <label for="cashback_percentage">Cashback Percentage:</label>
                                    <input type="number" step="0.01" id="cashback_percentage" name="cashback_percentage" value="{{ $settings['cashback_percentage'] }}">
                                </div> --}}


                                <div class="mb-3 row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Cashback Percentage:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="number" step="0.01" name="cashback_percentage"  value="{{ $settings['cashback_percentage'] }}" class="form-control @error('cashback_percentage') is-invalid @enderror" id="cashback_percentage" placeholder="cashback amount" />
                                        @error('cashback_percentage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="mb-3 row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Minimum Order Amount:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="number" step="0.01" name="cashback_limit" value="{{ $settings['cashback_limit'] }}" class="form-control @error('cashback_limit') is-invalid @enderror" id="cashback_limit" placeholder="cashback amount" />
                                        @error('cashback_limit')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <button type="submit">Update Settings</button> --}}

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="px-4 btn btn-primary" value="Update Settings" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
