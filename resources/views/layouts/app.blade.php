@extends('layouts.base')

@section('body')

    <x-navbar />

    <div class="max-w-7xl mx-auto mt-6">

        @yield('content')

    </div>
    
    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
