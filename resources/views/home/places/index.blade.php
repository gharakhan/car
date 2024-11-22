@component('home.layouts.content')
    <ul class="list-group">
        @foreach($places as $place)
            <a href="{{ route('places.show' , $place) }}">
                <li class="list-group-item">{{$place->name}}</li>
            </a>
        @endforeach
    </ul>
@endcomponent
