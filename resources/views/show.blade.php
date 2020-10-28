@extends('layouts.app')

@section('content')

<div class="w-1/2 mx-auto">
    <div class="bg-gray-100 rounded-tr-xl rounded-bl-xl px-6 py-8 flex flex-col mb-6 text-yellow-500">
        @foreach ($item as $key => $value)

            @if (is_array($value))
                <p class="text-black text-xl">{{ $key }}:</p>
                @foreach ($value as $subKey => $subVal)
                    @if (is_array($subVal))
                        <div class="mt-5"></div>
                        @foreach ($subVal as $nestedSubKey => $nestedSubVal)
                            @if (!is_array($nestedSubVal))
                                <span class="ml-4 text-black">{{ $nestedSubKey }}:</span>
                                <span class="ml-4">{{ $nestedSubVal }}</span>
                            @endif
                        @endforeach
                    @else
                        <span class="ml-4 text-black">{{ $subKey }}:</span>
                        <span class="ml-4">{{ $subVal }}</span>                    
                    @endif
                @endforeach
            @else
                <span class="text-black text-xl">{{ $key }}:</span>
                <span>{{ $value }}</span>
            @endif
        @endforeach
    </div>
</div>

@stop