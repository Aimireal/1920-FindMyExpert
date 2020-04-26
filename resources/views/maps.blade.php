@extends('layouts.app')

@section('content')
    <div>
        <div id="map" style="width: 1900px; height: 850px;"></div>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=weather"></script>
    </div>

    <script>
        var locations =
            [
                [
                    "Me",
                    53.814980, -1.734050,
                    1,
                    "Steven F. Morris",
                    "Sandfiddler Pawn Shop",
                    "5429 Tidewater Dr.",
                    "found"
                ],
                [
                    "London",
                    51.5074, -0.1278,
                    2,
                    "Myke Irving/ Georgia Mason",
                    "USAVE Auto Rental",
                    "Virginia Auto Rental on Virginia Beach Blvd",
                    "found"
                ],
                [
                    "Dublin",
                    53.344100, -6.267490,
                    3,
                    "Jimothy Donnegal",
                    "IRE-Autos",
                    "21 Patrick Drive",
                    "found"
                ]
            ];

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            center: new google.maps.LatLng(52.3555, 1.1743),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0], locations[i][6]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }

        var latPosition;
        var longPosition;

        function initialize() {
            var mapOptions = {
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            };
            initializeMarker();
        }

        function initializeMarker() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                    latPosition = position.coords.latitude;
                    longPosition = position.coords.longitude;

                    marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        icon: 'http://theonlytutorials.com/demo/x_office_calendar.png'
                    });
                    map.setCenter(pos);
                });
            }
        }
        initialize();
    </script>
@endsection