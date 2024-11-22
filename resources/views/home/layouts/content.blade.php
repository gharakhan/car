@extends('home.master')
@section('content')
    <div id="app" class="d-flex flex-column-fluid mt-10">
        <!--begin::Container-->
        <div class="container m-10">
            {{ $slot }}
        </div>
        <!--end::Container-->
    </div>
@endsection

{{--@section('style')--}}
{{--    {{ $style ?? '' }}--}}
{{--@endsection--}}

{{--@section('script')--}}
{{--    {{ $script ?? '' }}--}}
{{--@endsection--}}

