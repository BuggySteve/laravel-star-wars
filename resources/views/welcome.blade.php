@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center h-2/3 py-1 sm:px-6 lg:px-8">
        <div class="absolute top-0 right-0 mt-4 mr-4">
            @if (Route::has('login'))

                </div>
            @endif
            <div class="flex items-center justify-center">
                <p class="text-6xl">Welcome!</p>
            </div>
        </div>
    </div>
@endsection
