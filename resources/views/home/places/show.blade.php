<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Mapp styles -->
    <link rel="stylesheet" href="{{ asset('static/home/assets/plugins/map/css/mapp.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('static/home/assets/plugins/map/css/fa/style.css') }}" data-locale="true" />
    <!-- Your styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div id="app">
</div>
{{--<script type="text/javascript" src="{{ asset('static/home/assets/plugins/map/js/jquery-3.2.1.min.js') }}"></script>--}}
<!-- Mapp scripts -->
<script type="text/javascript" src="{{ asset('static/home/assets/plugins/map/js/mapp.env.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/home/assets/plugins/map/js/mapp.min.js') }}"></script>
<!-- Your scripts -->
<script type="text/javascript" src="{{ resource_path('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        var app = new Mapp({
            element: '#app',
            presets: {
                latlng: {
                    lat: {{ $place->lat }},
                    lng: {{ $place->lng }},
                },
                zoom: 15
            },
            apiKey: "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImRmOWE2MGNiZmYwYTEyNjI3YmQyOTAwZDFlNjU3OGZmMDcwNGFmMDJhM2M5YjAxYzM3ZTY3ZTQzMGMxMmE4ZWU4NDRiMzBjMzUyZTczNjJhIn0.eyJhdWQiOiIyNzkxOCIsImp0aSI6ImRmOWE2MGNiZmYwYTEyNjI3YmQyOTAwZDFlNjU3OGZmMDcwNGFmMDJhM2M5YjAxYzM3ZTY3ZTQzMGMxMmE4ZWU4NDRiMzBjMzUyZTczNjJhIiwiaWF0IjoxNzE5NzMzOTI1LCJuYmYiOjE3MTk3MzM5MjUsImV4cCI6MTcyMjMyNTkyNSwic3ViIjoiIiwic2NvcGVzIjpbImJhc2ljIl19.Tp8YlddBaelmxl8pUyeXymbSIg3Xbcr_LRDZzSZfmhpaP4Z3KmRX5FKHGJnazSw2t0o1sRfpegnAdMiwViTincad5dt7d-VU_HgWCbTC0xiFBqb_UhUQfyp9y7xpzOZs3QJjiLRZ5ABgnU2WSEyGDPXFajTLpHZeBRBI1eEZ8VUXhwCIHpDPYa5bhv16FNkoscyBFUJkxMOpq28iukeJmsKqdKMWjuUPAlq3Co7sn8UOZ4haW7X2cEYUGjF918ht3FJXYFdD3InDFOfwQq_DWAIqoy9kAA6plUqC8ILCvV5FW1hzQm6e0Tkoh_HxzYgC8U6S9nwnhnNWYog2wTyXTA"
            });
        app.addLayers();
        var crosshairIcon = {
            iconUrl: 'https://cloud.son.ir/index.php/s/qVUHj7HJSr1A7MK/download',
            iconSize:     [20, 20], // size of the icon
            iconAnchor:   [10, 10], // point of the icon which will correspond to marker's location
        };
        var marker = app.addMarker({
            latlng: {
                lat: 35.712706,
                lng: 51.367918,
            },
            draggable: true,
            icon: crosshairIcon,
            popup: false
        });
    });
</script>
{{--<script>--}}
{{--    const lat = {{ $place->lat }};--}}
{{--    const lng = {{ $place->lng }};--}}
{{--    //--}}
{{--    $(document).ready(function () {--}}

{{--        var app = new Mapp({--}}
{{--            element: "#app",--}}
{{--            presets: {--}}
{{--                latlng: {--}}
{{--                    lat: {{ $place->lat }},--}}
{{--                    lng: {{ $place->lng }},--}}
{{--                },--}}
{{--                zoom: 15,--}}
{{--            },--}}
{{--            apiKey:--}}
{{--                "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImRmOWE2MGNiZmYwYTEyNjI3YmQyOTAwZDFlNjU3OGZmMDcwNGFmMDJhM2M5YjAxYzM3ZTY3ZTQzMGMxMmE4ZWU4NDRiMzBjMzUyZTczNjJhIn0.eyJhdWQiOiIyNzkxOCIsImp0aSI6ImRmOWE2MGNiZmYwYTEyNjI3YmQyOTAwZDFlNjU3OGZmMDcwNGFmMDJhM2M5YjAxYzM3ZTY3ZTQzMGMxMmE4ZWU4NDRiMzBjMzUyZTczNjJhIiwiaWF0IjoxNzE5NzMzOTI1LCJuYmYiOjE3MTk3MzM5MjUsImV4cCI6MTcyMjMyNTkyNSwic3ViIjoiIiwic2NvcGVzIjpbImJhc2ljIl19.Tp8YlddBaelmxl8pUyeXymbSIg3Xbcr_LRDZzSZfmhpaP4Z3KmRX5FKHGJnazSw2t0o1sRfpegnAdMiwViTincad5dt7d-VU_HgWCbTC0xiFBqb_UhUQfyp9y7xpzOZs3QJjiLRZ5ABgnU2WSEyGDPXFajTLpHZeBRBI1eEZ8VUXhwCIHpDPYa5bhv16FNkoscyBFUJkxMOpq28iukeJmsKqdKMWjuUPAlq3Co7sn8UOZ4haW7X2cEYUGjF918ht3FJXYFdD3InDFOfwQq_DWAIqoy9kAA6plUqC8ILCvV5FW1hzQm6e0Tkoh_HxzYgC8U6S9nwnhnNWYog2wTyXTA",--}}
{{--        });--}}
{{--        app.addLayers();--}}
{{--        // app.addMenu();--}}
{{--        // app.addVectorLayers();--}}
{{--        // Add in a crosshair for the map--}}
{{--        var crosshairIcon = {--}}
{{--            iconUrl: 'https://toppng.com/uploads/preview/location-icon-png-vodafone-new-logo-11563014981dwqnx79fvn.png',--}}
{{--            iconSize:     [50, 50], // size of the icon--}}
{{--            iconAnchor:   [10, 10], // point of the icon which will correspond to marker's location--}}
{{--        };--}}
{{--        app.addMarker({--}}
{{--            name: 'basic-marker',--}}
{{--            latlng: {--}}
{{--                lat: {{ $place->lat }},--}}
{{--                lng: {{ $place->lng }},--}}
{{--            },--}}
{{--            draggable: true,--}}
{{--            icon: crosshairIcon,--}}
{{--            popup: false--}}
{{--        });--}}
{{--        // marker = L.marker([lat, lng], {draggable: false}).addTo(map);--}}

{{--        // function setMapCenter(lat, lng, zoom) {--}}
{{--        //     map.setView([lat, lng], zoom);--}}
{{--        //     marker = marker.setLatLng([lat, lng]);--}}
{{--        //     $('#lat').val(lat);--}}
{{--        //     $('#lng').val(lng);--}}
{{--        // }--}}
{{--    });--}}
{{--</script>--}}
</body>
</html>
