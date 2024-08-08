@extends('layouts.master')
@section('css')
    <!--Internal Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-toggle@2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('title')
    CashBack Setting
@stop

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
                                        <input type="hidden" name="cashback_enabled" value="off">
                                        <input type="checkbox" name="cashback_enabled" id="cashback_enabled_toggle"
                                        @if($settings['cashback_enabled']=='on') checked @endif
                                        data-toggle="toggle" data-on="Enabled" data-off="Disabled">
                                        @error('cashback_enabled')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Cashback Type</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="checkbox" name="cashback_type" id="cashback_type_toggle"
                                        @if($settings['cashback_type'] == 'percentage') checked @endif
                                        data-toggle="toggle" data-on="Percentage" data-off="Amount">
                                    </div>
                                </div>

                                <div class="mb-3 row" id="cashback_amount_row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Cashback Amount:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="number" name="cashback_amount" value="{{ $settings['cashback_amount'] }}" class="form-control @error('cashback_amount') is-invalid @enderror" id="cashback_amount" placeholder="cashback amount" />
                                        @error('cashback_amount')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row" id="cashback_percentage_row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Cashback Percentage:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="number" step="0.01" name="cashback_percentage" value="{{ $settings['cashback_percentage'] }}" class="form-control @error('cashback_percentage') is-invalid @enderror" id="cashback_percentage" placeholder="cashback percentage" />
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
                                        <input type="number" step="0.01" name="cashback_limit" value="{{ $settings['cashback_limit'] }}" class="form-control @error('cashback_limit') is-invalid @enderror" id="cashback_limit" placeholder="Minimum order amount" />
                                        @error('cashback_limit')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Points per Cash Unit:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="number" step="0.01" name="points_per_money" value="{{ $settings['points_per_money'] }}" class="form-control @error('points_per_money') is-invalid @enderror" id="points_per_money" placeholder="Points per dollar" />
                                                @error('points_per_money')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <p>
                                                    <small class="form-text text-muted">amount in points.</small>
                                                </p>
                                            </div>
                                            <div class="col-6">
                                                <input type="number" step="0.01" name="money_per_point" value="{{ $settings['money_per_point'] }}" class="form-control @error('money_per_point') is-invalid @enderror" id="money_per_point" placeholder="Dollars per point" />
                                                @error('money_per_point')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <p>
                                                    <small class="form-text text-muted">equal in cash units.</small>
                                                </p>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">Specify how many points equal how much cash and vice versa.</small>
                                    </div>
                                </div>

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
    <!--Internal Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-toggle@2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(document).ready(function() {


            $('#cashback_enabled_toggle').change(function() {
                if (!$(this).prop('checked')) {
                    $(this).val('off');
                }
            });

            // Toggle visibility of fields based on cashback type
            function toggleCashbackFields() {
                if ($('#cashback_type_toggle').prop('checked')) {
                    $('#cashback_amount_row').hide();
                    $('#cashback_percentage_row').show();
                } else {
                    $('#cashback_amount_row').show();
                    $('#cashback_percentage_row').hide();
                }
            }

            toggleCashbackFields();

            $('#cashback_type_toggle').change(function() {
                toggleCashbackFields();
                if ($(this).prop('checked')) {
                    $('#cashback_amount').val(0); // Set amount to 0 if percentage is selected
                } else {
                    $('#cashback_percentage').val(0); // Set percentage to 0 if amount is selected
                }
            });
        });
    </script>
@endsection
