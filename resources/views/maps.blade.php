@extends('layouts.app')

@section('content')
    <div>
        <div id="map" style="width: 1900px; height: 850px;"></div>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=weather"></script>
    </div>

    <script>
        var locations = [
            @foreach($experts as $expert)
            {lat:'{{$expert->latitude}}', long:'{{$expert->longitude}}',
                name:'{{$expert->company_name}}', address:'{{$expert->address}}'},
            @endforeach
        ];

        var infowindow = new google.maps.InfoWindow();
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            center: new google.maps.LatLng(53.8108, -1.7626),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        for (i = 0; i < locations.length; i++) {
            createMarker(locations[i])
        }

        function createMarker(data)
        {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(data.lat, data.long),
                map: map,
                title: data.name
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(data.address);
                infowindow.open(map, marker);
            });
        };


    </script>
@endsection