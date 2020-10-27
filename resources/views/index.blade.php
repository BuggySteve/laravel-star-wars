@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto mt-6">
    <div class="flex flex-col">
        @if (count($items) > 0)
            @foreach ($items as $item)
                <div class="bg-gray-100 rounded-tr-xl rounded-bl-xl px-6 py-8 flex flex-col mb-6 text-yellow-500">
                    <p>{{ $item['name'] }}</p>
                </div>
            @endforeach
        @else
            <p class="text-red-700">No results found</p>
        @endif
    </div>
    <div class="flex justify-between mb-6">
        @if ($previous != '')
            <a class="z-40 inline-block px-10 py-3 text-base leading-6 font-medium text-black bg-yellow-300 hover:bg-yellow-200 transition duration-150 ease-in-out rounded-tr-xl rounded-bl-xl whitespace-no-wrap -ml-1 mr-1 focus:mt-0.5 focus:-mb-0.5" href="/{{$type}}?page={{ $previous }}">Previous</a>
        @endif
        @if ($next != '')
            <a class="z-40 inline-block px-10 py-3 text-base leading-6 font-medium text-black bg-yellow-300 hover:bg-yellow-200 transition duration-150 ease-in-out rounded-tr-xl rounded-bl-xl whitespace-no-wrap -ml-1 mr-1 focus:mt-0.5 focus:-mb-0.5" href="/{{$type}}?page={{ $next }}">Next</a>
        @endif
    </div>
</div>



@stop