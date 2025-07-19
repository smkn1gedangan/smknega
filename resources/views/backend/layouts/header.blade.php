<nav aria-label="menu nav" class="bg-gray-300 ">
     <div class="">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <!-- Logo or other content -->
                        </div>
                        <div class="">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Your links here -->
                            </div>
                        </div>
                    </div>
                    <div x-data="{ open: false }" class="">
                        <div class="ml-4 flex items-center pr-6">

                            <h1 class="text-black capitalize text-base font-semibold">hello , @auth
                                {{Auth::user()->name}}
                            @endauth
                                @guest
                                    tak dikenali
                                @endguest
                            </h1>
                            <!-- Profile dropdown -->
                            <div  class="relative ml-3">
                                <button @click="open = !open" type="button" class="relative flex max-w-xs items-center rounded-full  text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="{{asset("img/static_icon.png")}}" alt="">
                                </button>

                                <!-- Dropdown menu -->
                                <div x-show="open"  x-transition:enter="transition ease-out duration-100" x-transition:leave="transition ease-in duration-75" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <a href="{{route("profile-user",Auth::user()->id)}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                    <form action="{{route('logout')}}" method="POST" role="menuitem" tabindex="-1" id="user-menu-item-2">
                                        @csrf
                                        <button type="submit" class="block px-4 py-2 text-sm text-gray-700">Sign Out</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
           
</nav>
