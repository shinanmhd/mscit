<x-app-layout>

    <div class="w-full bg-slate-50 min-h-screen flex"
         x-init="
                Alpine.store('sidebar').full = false;
                Alpine.store('sidebar').navOpen = false;
                Alpine.store('sidebar').active = 'home';
         "
    >

        <style>
            .gm-style iframe + div { border:none!important; }
        </style>

        {{-- start side slide overs --}}
        <div class="min-h-screen max-h-screen overflow-y-scroll w-0 opacity-0 bg-gray-100 dark:bg-zinc-800 border-r-0 border-gray-200 dark:border-zinc-900 transition-all duration-500"
             id="active_incidents">
            @livewire('front-end.incident-map.active-incidents')
        </div>
        <div class="min-h-screen max-h-screen overflow-y-scroll w-0 opacity-0 bg-gray-100 dark:bg-zinc-800 border-r-0 border-gray-200 dark:border-zinc-900 transition-all duration-500"
             id="incident_detail">
            @livewire('front-end.incident-map.incident-details')
        </div>
        {{-- end side slide overs --}}

        <div class="min-h-screen flex-grow" id="map"></div>

        {{--<div id="my-map-inputs">--}}
        {{--    <div data-map-selector="true">--}}
        {{--        <input class="form-control map-selector-lat" type="number" name="lat" value="4.175804" step="0.000001"--}}
        {{--               min="-90" max="90" placeholder="Latitude" />--}}

        {{--        <input class="form-control map-selector-lng" type="number" name="lng" value="73.509337" step="0.000001"--}}
        {{--               min="-180" max="180" placeholder="Longitude" />--}}

        {{--        <div>--}}
        {{--            <input class="map-selector-search" type="text" placeholder="Search..." />--}}
        {{--            <div class="map-selector-map"></div>--}}
        {{--        </div>--}}
        {{--    </div>--}}
        {{--</div>--}}

        {{--<div id="display-map"
             data-map-selector="true" data-disabled="false" data-polygon="(73.50932514628285 4.175929944808645,73.50954911073559 4.175730219415812,73.50914768804103 4.17570881870468,73.50932514628285 4.175929944808645)" data-enable-polygon="true" data-enable-marker="false">
            <div class="map-selector-map"></div>
        </div>--}}
    </div>

    @push('scripts')
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7yU63yNaUg_A2Y8PYUw_uGITaBk8fsDc&libraries=drawing&callback=initMap" async></script>

        {{--<script>
            (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
                key: "AIzaSyAb9Sx0MOpStwtKJPXMwa-ITHFmOiGjfIA",
                v: "weekly",
                // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
                // Add other bootstrap parameters as needed, using camel case.
            });
        </script>--}}

        <script>


            let map, activeInfoWindow, markers = [];

            /* ----------------------------- Initialize Map ----------------------------- */
            async function initMap() {
                // The location of Uluru
                const position = { lat: 4.1755, lng: 73.5093 };
                // Request needed libraries.
                //@ts-ignore
                /*const { Map } = await google.maps.importLibrary("maps");*/
                const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

                const styledMapType = new google.maps.StyledMapType(
                    [
                            {
                                featureType: 'poi.business',
                                stylers: [{visibility: 'off'}]
                            },
                            {
                                featureType: 'transit',
                                elementType: 'labels.icon',
                                stylers: [{visibility: 'off'}]
                            },
                        {
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#212121"
                                }
                            ]
                        },
                        {
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#757575"
                                }
                            ]
                        },
                        {
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "color": "#212121"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#757575"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.country",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#9e9e9e"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.land_parcel",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.locality",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#bdbdbd"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.neighborhood",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "labels.text",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#757575"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#181818"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#616161"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "color": "#1b1b1b"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#2c2c2c"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#8a8a8a"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#373737"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#3c3c3c"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway.controlled_access",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#4e4e4e"
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#616161"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#757575"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels.text",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#3d3d3d"
                                }
                            ]
                        }
                    ],
                    { name: "Styled Map" },
                );


                const map = new google.maps.Map(document.getElementById("map"), {
                /*map = new Map(document.getElementById("map"), {*/
                    zoom: 15,
                    center: { lat: 4.1755, lng: 73.5093 },
                    mapId: "map",
                    disableDefaultUI: true,
                    zoomControl: true,
                });

                const trafficLayer = new google.maps.TrafficLayer();
                trafficLayer.setMap(map);

                //Associate the styled map with the MapTypeId and set it to display.
                map.mapTypes.set("map", styledMapType);
                map.setMapTypeId("map");


                /*
                 * start
                 * add control buttons to map
                */
                const addClosureControlDiv = document.createElement("div"); // Create the DIV to hold the control.
                const addClosureControl = createAddClosureControl(map); // Create the control.

                // Append the control to the DIV.
                addClosureControlDiv.appendChild(addClosureControl);
                map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(addClosureControlDiv);


                const allClosuresControlDiv = document.createElement("div"); // Create the DIV to hold the control.
                const allClosuresControl = createAllClosuresControl(map); // Create the control.

                // Append the control to the DIV.
                allClosuresControlDiv.appendChild(allClosuresControl);
                map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(allClosuresControlDiv);
                /* end add control buttons to map */

                window.mainMap = map;


                /*
                * load active closures
                * */
                fetch('{{ route('api.active-closures') }}')
                    .then(response => response.json())
                    .then(response_data => {
                        // Process the received data from your Laravel route
                        response_data.map(data => {
                            console.log(data);

                            if (data.shape === 'polygon')
                            {
                                const pathsArray = JSON.parse(data.shape_data);
                                const polygonCoords = pathsArray.map(coord =>
                                    new google.maps.LatLng(coord.lat, coord.lng)
                                );

                                const polygonStyle = new google.maps.Polygon({
                                    paths: polygonCoords,
                                    strokeColor: data.closure_type.color,  // Adjust styling as needed
                                    strokeOpacity: 1,
                                    strokeWeight: 2,
                                    fillColor: data.closure_type.color,
                                    fillOpacity: 0.75,
                                });

                                polygonStyle.setMap(window.mainMap);

                                google.maps.event.addListener(polygonStyle, 'click', function(event) {
                                    // Handle the click event here
                                    //alert('Polygon clicked at:'+ data.id);
                                    Livewire.dispatch('front-end::load_incident', { id: data.id })

                                    const incidentDetailDiv = document.getElementById("incident_detail");
                                    /*incidentDetailDiv.classList.remove("hidden");*/
                                    incidentDetailDiv.classList.remove("opacity-0");
                                    incidentDetailDiv.classList.remove("border-r-0");
                                    incidentDetailDiv.classList.add("border-r");
                                    incidentDetailDiv.classList.add("w-full");
                                    incidentDetailDiv.classList.add("md:w-1/3");
                                    incidentDetailDiv.classList.add("flex");
                                    incidentDetailDiv.classList.add("flex-col");
                                });
                            }

                            else if (data.shape === 'marker')
                            {
                                const iconImage = document.createElement("img");

                                iconImage.src = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/info-i_maps.png';

                                const map = window.mainMap;
                                const marker = new google.maps.marker.AdvancedMarkerElement({
                                    map,
                                    position: new google.maps.LatLng(data.lat, data.lng),
                                    content: iconImage,
                                });

                                google.maps.event.addListener(marker, 'click', function(event) {
                                    // Handle the click event here
                                    //alert('Polygon clicked at:'+ data.id);
                                    Livewire.dispatch('front-end::load_incident', { id: data.id })

                                    const incidentDetailDiv = document.getElementById("incident_detail");
                                    /*incidentDetailDiv.classList.remove("hidden");*/
                                    incidentDetailDiv.classList.remove("opacity-0");
                                    incidentDetailDiv.classList.remove("border-r-0");
                                    incidentDetailDiv.classList.add("border-r");
                                    incidentDetailDiv.classList.add("w-full");
                                    incidentDetailDiv.classList.add("md:w-1/3");
                                    incidentDetailDiv.classList.add("flex");
                                    incidentDetailDiv.classList.add("flex-col");
                                });
                            }
                        });
                    });

                /*map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: 4.1755,
                        lng: 73.5093,
                    },
                    zoom: 15
                });*/

                // map.addListener("click", function(event) {
                //     mapClicked(event);
                // });
                //
                // const trafficLayer = new google.maps.TrafficLayer();
                // trafficLayer.setMap(map);

                // var customStyled = [
                //     {
                //         featureType: "all",
                //         elementType: "labels",
                //         stylers: [{ visibility: "off" }]
                //     },
                //     {
                //         featureType: 'poi.business',
                //         stylers: [{visibility: 'off'}]
                //     },
                //     {
                //         featureType: 'transit',
                //         elementType: 'labels.icon',
                //         stylers: [{visibility: 'off'}]
                //     }
                // ];
                // map.set('styles',customStyled);
                //mapSelector.bind(document.getElementById('map-container'));

                //initMarkers();

            }
            //initMap()


            function closeIncidentDetail()
            {
                const incidentDetailDiv = document.getElementById("incident_detail");
                /*incidentDetailDiv.classList.add("hidden");*/
                incidentDetailDiv.classList.add("opacity-0");
                incidentDetailDiv.classList.add("border-r-0");
                incidentDetailDiv.classList.remove("border-r");
                incidentDetailDiv.classList.remove("w-full");
                incidentDetailDiv.classList.remove("md:w-1/3");
                incidentDetailDiv.classList.remove("flex");
                incidentDetailDiv.classList.remove("flex-col");

            }


            function closeActiveIncidents()
            {
                const incidentDetailDiv = document.getElementById("active_incidents");
                /*incidentDetailDiv.classList.add("hidden");*/
                incidentDetailDiv.classList.add("opacity-0");
                incidentDetailDiv.classList.add("border-r-0");
                incidentDetailDiv.classList.remove("border-r");
                incidentDetailDiv.classList.remove("w-full");
                incidentDetailDiv.classList.remove("md:w-1/4");
                incidentDetailDiv.classList.remove("flex");
                incidentDetailDiv.classList.remove("flex-col");
            }


            /* --------------------------- Initialize Markers --------------------------- */
            function initMarkers() {
                const initialMarkers = [];

                for (let index = 0; index < initialMarkers.length; index++) {

                    const markerData = initialMarkers[index];
                    const marker = new google.maps.Marker({
                        position: markerData.position,
                        label: markerData.label,
                        draggable: markerData.draggable,
                        map
                    });
                    markers.push(marker);

                    const infowindow = new google.maps.InfoWindow({
                        content: `<b>${markerData.position.lat}, ${markerData.position.lng}</b>`,
                    });
                    marker.addListener("click", (event) => {
                        if(activeInfoWindow) {
                            activeInfoWindow.close();
                        }
                        infowindow.open({
                            anchor: marker,
                            shouldFocus: false,
                            map
                        });
                        activeInfoWindow = infowindow;
                        markerClicked(marker, index);
                    });

                    marker.addListener("dragend", (event) => {
                        markerDragEnd(event, index);
                    });
                }
            }

            function createAddClosureControl(map) {
                const addClosureButton = document.createElement("button");

                // Set CSS for the control.
                addClosureButton.style.backgroundColor = "#fff";
                addClosureButton.style.border = "2px solid #fff";
                addClosureButton.style.borderRadius = "3px";
                addClosureButton.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
                addClosureButton.style.color = "rgb(25,25,25)";
                addClosureButton.style.cursor = "pointer";
                addClosureButton.style.fontFamily = "Roboto,Arial,sans-serif";
                addClosureButton.style.fontSize = "16px";
                addClosureButton.style.lineHeight = "38px";
                addClosureButton.style.margin = "8px 0 22px";
                addClosureButton.style.padding = "0 5px";
                addClosureButton.style.textAlign = "center";
                addClosureButton.textContent = "Add Closure";
                addClosureButton.title = "Add Closure";
                addClosureButton.type = "button";

                // Set up the click event listeners: simply set the map to Chicago.
                addClosureButton.addEventListener("click", () => {
                    Livewire.dispatch('openModal', { component: 'user.create-road-closure' })
                });

                return addClosureButton;
            }

            function createAllClosuresControl(map) {
                const allClosuresButton = document.createElement("button");

                // Set CSS for the control.
                allClosuresButton.style.backgroundColor = "#fff";
                allClosuresButton.style.border = "2px solid #fff";
                allClosuresButton.style.borderRadius = "3px";
                allClosuresButton.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
                allClosuresButton.style.color = "rgb(25,25,25)";
                allClosuresButton.style.cursor = "pointer";
                allClosuresButton.style.fontFamily = "Roboto,Arial,sans-serif";
                allClosuresButton.style.fontSize = "16px";
                allClosuresButton.style.lineHeight = "38px";
                allClosuresButton.style.margin = "8px 4px 22px";
                allClosuresButton.style.padding = "0 5px";
                allClosuresButton.style.textAlign = "center";
                allClosuresButton.textContent = "All Closures";
                allClosuresButton.title = "All Closures";
                allClosuresButton.type = "button";

                // Set up the click event listeners: simply set the map to Chicago.
                allClosuresButton.addEventListener("click", () => {
                    Livewire.dispatch('front-end::show_all_incidents')

                    const allIncidentsDiv = document.getElementById("active_incidents");
                    allIncidentsDiv.classList.remove("opacity-0");
                    allIncidentsDiv.classList.remove("border-r-0");
                    allIncidentsDiv.classList.add("border-r");
                    allIncidentsDiv.classList.add("w-full");
                    allIncidentsDiv.classList.add("md:w-1/4");
                    allIncidentsDiv.classList.add("flex");
                    allIncidentsDiv.classList.add("flex-col");
                });

                return allClosuresButton;
            }

            /* ------------------------- Handle Map Click Event ------------------------- */
            function mapClicked(event) {
                console.log(map);
                console.log(event.latLng.lat(), event.latLng.lng());
            }

            /* ------------------------ Handle Marker Click Event ----------------------- */
            function markerClicked(marker, index) {
                console.log(map);
                console.log(marker.position.lat());
                console.log(marker.position.lng());
            }

            /* ----------------------- Handle Marker DragEnd Event ---------------------- */
            function markerDragEnd(event, index) {
                console.log(map);
                console.log(event.latLng.lat());
                console.log(event.latLng.lng());
            }

            /*
            * Load incident detail when called from all incidents livewire component
            * */
            Livewire.on('front-end::show_incident_slide_over', (event) => {
                Livewire.dispatch('front-end::load_incident', { id: event.incident_id })

                const incidentDetailDiv = document.getElementById("incident_detail");
                /*incidentDetailDiv.classList.remove("hidden");*/
                incidentDetailDiv.classList.remove("opacity-0");
                incidentDetailDiv.classList.add("w-full");
                incidentDetailDiv.classList.add("md:w-1/3");
                incidentDetailDiv.classList.add("flex");
                incidentDetailDiv.classList.add("flex-col");
            });



            // new road closure added
            // window.Echo.channel("closure").listen("ClosureAdded", (event) => {
            //     console.log(event);
            // });
        </script>
    @endpush

</x-app-layout>
