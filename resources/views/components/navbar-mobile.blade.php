<!--
Mobile menu, show/hide based on mobile menu state.

Entering: "duration-200 ease-out"
    From: "opacity-0 scale-95"
    To: "opacity-100 scale-100"
Leaving: "duration-100 ease-in"
    From: "opacity-100 scale-100"
    To: "opacity-0 scale-95"
-->
<div 
    x-show="isOpen"
    x-transition:enter="duration-200 ease-out"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="duration-100 ease-in"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="absolute top-0 inset-x-0 z-20 p-2 transition transform origin-top-right md:hidden"
>
    <div class="rounded-lg shadow-lg">
        <div class="rounded-lg shadow-xs bg-white divide-y-2 divide-gray-50">
            <div class="pt-5 pb-6 px-5 space-y-6">
                <div class="flex items-center justify-between">
                <div>
                    <a href="{{ route('home') }}" class="w-auto">
                        <x-logo class="h-8"/>
                    </a>                
                </div>
                <div class="-mr-2">
                    <button type="button" @click="isOpen = !isOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    </button>
                </div>
                </div>
                <div>
                <nav class="grid gap-y-8">
                    <a href="/business" class="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                    <div class="text-base leading-6 font-medium text-gray-900">
                        People
                    </div>
                    </a>
                    <a href="/sim-only" class="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                    <div class="text-base leading-6 font-medium text-gray-900">
                        Planets
                    </div>
                    </a>
                    <a href="/phone" class="-m-3 p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                    <div class="text-base leading-6 font-medium text-gray-900">
                        Species
                    </div>
                    </a>
                    @auth
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                        >
                            Log out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                        @endif
                    @endauth
                </nav>
                </div>
            </div>
        </div>
    </div>
</div>