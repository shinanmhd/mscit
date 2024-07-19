import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    // wsHost: import.meta.env.VITE_REVERB_HOST,
    wsHost: 'localhost',
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

/**
 * Testing Channels & Events & Connections
 */
// window.Echo.channel("closure").listen("ClosureAdded", (event) => {
//     console.log(event);
// });
window.Echo.channel("closure").listen("ClosureAdded", (event) => {

    // console.log(window.mainMap);

    const pathsArray = JSON.parse(event.closure.shape_data);
    // const polygon = new google.maps.Polygon({
    //     paths: pathsArray.map(point => new google.maps.LatLng(point.lat, point.lng)),
    // });
    const polygonCoords = pathsArray.map(coord =>
        new google.maps.LatLng(coord.lat, coord.lng)
    );

    const polygonStyle = new google.maps.Polygon({
        paths: polygonCoords,
        strokeColor: '#ffcc00',  // Adjust styling as needed
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#ffe57f',
        fillOpacity: 0.35,
    });

    polygonStyle.setMap(window.mainMap);

    $wireui.notify({
        icon: 'info',
        title: 'New Road Closure',
        description: 'A new road closure information has been added.',
    })
});
