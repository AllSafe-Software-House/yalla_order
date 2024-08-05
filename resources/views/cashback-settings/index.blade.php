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

<form action="{{ route('cashback-settings.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="cashback_enabled">Cashback Enabled:</label>
        <input type="checkbox" id="cashback_enabled" name="cashback_enabled" value="1" {{ $settings['cashback_enabled'] ? 'checked' : '' }}>
    </div>

    <div>
        <label for="cashback_amount">Cashback Amount:</label>
        <input type="number" step="0.01" id="cashback_amount" name="cashback_amount" value="{{ $settings['cashback_amount'] }}">
    </div>

    <div>
        <label for="cashback_percentage">Cashback Percentage:</label>
        <input type="number" step="0.01" id="cashback_percentage" name="cashback_percentage" value="{{ $settings['cashback_percentage'] }}">
    </div>

    <div>
        <label for="cashback_limit">Minimum Order Amount:</label>
        <input type="number" step="0.01" id="cashback_limit" name="cashback_limit" value="{{ $settings['cashback_limit'] }}">
    </div>

    <button type="submit">Update Settings</button>
</form>

@endsection


@section('js')
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
