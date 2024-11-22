<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Mapp styles -->
    <link rel="stylesheet" href="{{ asset('static/home/assets/plugins/map/css/mapp.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/home/assets/plugins/map/css/fa/style.css') }}" data-locale="true"/>
    <!-- Your styles -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet"
          type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
</head>
<body>
<br>
<div class="container">
    @yield('content')
</div>

{{--<script type="text/javascript" src="{{ asset('static/home/assets/plugins/map/js/jquery-3.2.1.min.js') }}"></script>--}}
<!-- Mapp scripts -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('static/home/assets/plugins/map/js/mapp.env.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/home/assets/plugins/map/js/mapp.min.js') }}"></script>
<!-- Your scripts -->
<script type="text/javascript" src="{{ resource_path('js/app.js') }}"></script>
</body>
</html>
