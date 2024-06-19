@extends('layouts.master')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .text-center{
            text-align: center;
        }
        #map{
            width: "100%";
            height: 400px;
        }

    </style>
@section('title')
    Add Resturant
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"><a href="{{ route('resturantlist') }}" style="color: #9B4999">Resturants</a></h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Add New Resturant</span>
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
    <div class="card-body" onload="initMap()">
        <form action="{{ route('store') }}" class="d-grid" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="py-2">Resturant Name:</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Resturant Name">
            </div>
            <div class="mb-3">
                <label for="name" class="py-2">اسم المطعم:</label>
                <input type="text" id="name" class="form-control" name="name_ar" placeholder="اسم المطعم">
            </div>
            <div class="mb-3">
                <label for="descrption" class="py-2">Resturant Descrption:</label>
                <textarea type="text" id="descrption" class="form-control" name="descrption" cols="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="descrption" class="py-2">وصف للمطعم:</label>
                <textarea type="text" id="descrption" class="form-control" name="descrption_ar" cols="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="start_time" class="py-2">Start Work Time:</label>
                <input type="time" id="start_time" class="form-control" name="starttime">
            </div>
            <div class="mb-3">
                <label for="end_time" class="py-2">End Work Time:</label>
                <input type="time" id="end_time" class="form-control" name="endtime">
            </div>
            <div class="mb-3">
                <label for="address" class="py-2">The Address:</label>
                <input type="text" id="address" class="form-control" name="address">
            </div>
            <div class="mb-3">
                <label for="address" class="py-2">العنوان:</label>
                <input type="text" id="address" class="form-control" name="address_ar">
            </div>
            <div class="mb-3">
                <label for="delivery_fee" class="py-2">Delivery Fee:</label>
                <input type="number" id="delivery_fee" class="form-control" name="delivery_fee" placeholder="10 LE">
            </div>
            <div class="mb-3">
                <label for="logo" class="py-2">Resturant logo:</label>
                <input type="file" id="logo" class="form-control" name="logo">
            </div>
            <input type="hidden"  class="btn btn-primary btn-sm col-12" name="place" value="restaurantes">
            <div id="map"></div>
            <br>
            <input type="hidden" id="latitude" name="latitude">
            <input type="hidden" id="longitude" name="longitude">
            <input type="submit"  class="btn btn-primary btn-sm col-12" value="Add">
        </form>
    </div>
</div>
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAr4ft548wTGrMeBlBt5DLLGUwVLD6420g&loading=async&region=EG&language=ar&callback=initMap">
</script>
    <script>
        let map, activeInfoWindow, markers = [];

        // Example data
        const data = {
            title: "Example Marker"
        };

        /* ----------------------------- Initialize Map ----------------------------- */
        function initMap() {
            let defaultCenter = { lat: 0, lng: 0 };
            map = new google.maps.Map(document.getElementById("map"), {
                center: defaultCenter,
                zoom: 15
            });
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    position => {
                        const userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        map.setCenter(userLocation);
                        addMarker(userLocation, "Your Location");
                    },
                    () => {
                        handleLocationError(true, map.getCenter());
                    }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, map.getCenter());
            }

            map.addListener("click", function(event) {
                mapClicked(event);
            });

            initMarkers();
        }

        function handleLocationError(browserHasGeolocation, pos) {
            const infoWindow = new google.maps.InfoWindow({
                position: pos,
                content: browserHasGeolocation
                    ? "Error: The Geolocation service failed."
                    : "Error: Your browser doesn't support geolocation."
            });
            infoWindow.open(map);
        }

        /* --------------------------- Initialize Markers --------------------------- */
        function initMarkers() {
            const marker = new google.maps.Marker({
                position: { lat: 28.627137, lng: 79.821603 },
                map: map,
                title: data.title
            });

            const infoWindow = new google.maps.InfoWindow({
                content: `<h3>${data.title}</h3>`
            });

            marker.addListener("click", () => {
                if (activeInfoWindow) {
                    activeInfoWindow.close();
                }
                infoWindow.open(map, marker);
                activeInfoWindow = infoWindow;
            });

            currentMarker = marker;
        }

        function addMarker(location, title) {
            if (currentMarker) {
                currentMarker.setMap(null);
                currentMarker = null;
            }

            const marker = new google.maps.Marker({
                position: location,
                map: map,
                title: title
            });

            currentMarker = marker;
        }

        function mapClicked(event) {
            const latLng = event.latLng;
            addMarker(latLng, "New Marker");

            document.getElementById('latitude').value = latLng.lat();
            document.getElementById('longitude').value = latLng.lng();
        }
    </script>
@endsection
