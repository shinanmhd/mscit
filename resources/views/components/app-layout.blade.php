<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GoFlow</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

    <script>
        if (
            localStorage.getItem('color-theme') === 'dark' ||
            (!('color-theme' in localStorage) &&
                window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    @filamentStyles
    <wireui:scripts />
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body x-data class="min-h-screen antialiased flex justify-between max-w-full">

    <x-app-sidebar />

    <div class="min-h-screen w-full flex-grow relative ">
        <div class="h-0 absolute top-0 left-0 w-full z-20"></div>
        <x-app-topbar />
        {{ $slot }}
    </div>

    @filamentScripts
    @vite('resources/js/app.js')
    @livewireScripts
    @livewire('wire-elements-modal')
    @stack('scripts')
    <script>

        function initIncidentMap() {

            var incident_map = new google.maps.Map(document.getElementById('incident_map'), {
                center: { lat: 4.1755, lng: 73.5093 },
                zoom: 16
            });


            //set shape on map
            /*const shapeDataSaved = [
                {
                    "lat": 4.1776293684609325,
                    "lng": 73.50738255583047
                },
                {
                    "lat": 4.1769873484279865,
                    "lng": 73.50658862196207
                },
                {
                    "lat": 4.176174122298708,
                    "lng": 73.50620238386392
                },
                {
                    "lat": 4.177137153149341,
                    "lng": 73.50772587858438
                }
            ];
            const polygon = new google.maps.Polygon({
                paths: shapeDataSaved.map(point => new google.maps.LatLng(point.lat, point.lng)),
            });
            polygon.setMap(incident_map);*/



            var drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: [
                        google.maps.drawing.OverlayType.MARKER,
                        google.maps.drawing.OverlayType.CIRCLE,
                        google.maps.drawing.OverlayType.POLYGON,
                    ]
                },
                polygonOptions: {
                    editable: true
                }

            });
            drawingManager.setMap(incident_map);

            google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
                let newShape = event.overlay;
                let shapeType = event.type;
                let markerPositionLat = 0.0;
                let markerPositionLng = 0.0;
                let shapeData = {};

                if (shapeType === 'circle') {
                    shapeData.center = newShape.getCenter().toJSON(); // Center coordinates
                    shapeData.radius = newShape.getRadius(); // Radius in meters
                } else if (shapeType === 'polygon') {
                    shapeData.paths = newShape.getPath().getArray().map(point => point.toJSON()); // Array of polygon vertices
                } else {
                    // assume it is a marker
                    let position = newShape.getPosition();
                    markerPositionLat = position.lat();
                    markerPositionLng = position.lng();
                    // console.log('Marker position:', position.lat(), position.lng(), shapeType);
                }

                // send shape data to the livewire component
                Livewire.dispatch('update_map_shape', {
                    shape_type: JSON.stringify(shapeType, getCircularReplacer()),
                    shape_data: JSON.stringify(shapeData, getCircularReplacer()),
                    marker_lat: markerPositionLat,
                    marker_lng: markerPositionLng
                });
            });
        }

        const getCircularReplacer = () => {
            const seen = new WeakSet();
            return (key, value) => {
                if (typeof value === "object" && value !== null) {
                    if (seen.has(value)) {
                        return;
                    }
                    seen.add(value);
                }
                return value;
            };
        };

    </script>

    <x-notifications />
</body>
</html>
