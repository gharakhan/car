@component('home.layouts.content')
    <div class="container m-10">
        <h1>سلام و صد سلام</h1>
        <hr>
        {{ count($transports) }}
        <hr>
{{--        <a href="{{ route('transports.create') }}" type="button" class="btn btn-outline-primary">Transports</a>--}}
    </div>
@endcomponent
