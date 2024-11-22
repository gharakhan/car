@component('home.layouts.content')
    <ul class="list-group">
        @foreach($transports as $transport)
            <a href="{{ route('transports.show' , $transport) }}">
                <li class="list-group-item">{{$transport->name}}</li>
            </a>
        @endforeach
    </ul>
@endcomponent
