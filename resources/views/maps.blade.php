@extends('layouts.app')

@section('content')
    <div>
        <div id="map" style="width: 1900px; height: 850px;"></div>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=weather"></script>
    </div>

    <script>
        var locations = [
            @foreach($experts as $expert)
                [ {{$expert->latitude }}, {{ $expert->longitude }} ],
            @endforeach
        ];

        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9,
            center: new google.maps.LatLng(52.3555, 1.1743),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                map: map
            });
        }
    </script>
@endsection