<nav class="bg-transparent w-full absolute top-0 left-0">
    <div class="flex items-center justify-between mx-auto p-4 gap-x-12">

        <div class="flex pl-0 md:pl-12 pr-12 md:pr-0 flex-grow">
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search icon</span>
                </div>
                <input type="text" id="search-navbar" class="block w-full px-2 py-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
            </div>
        </div>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto" id="navbar-search">
            <div class="relative mt-3 md:hidden">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-white" placeholder="Search...">
            </div>

            @auth()
                <!-- User account dropdown -->
                <div class="relative inline-block px-3 text-left" x-data="{userMenu: false}" x-on:click.away="userMenu = false">
                    <div>
                        <button type="button" class="group w-full rounded-md bg-gray-100 px-3.5 py-2 text-left text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-100"
                        x-on:click="userMenu = !userMenu">
                            <span class="flex w-full items-center justify-between">
                              <span class="flex min-w-0 items-center justify-between space-x-3">
                                <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300"
                                     src="{{ auth()->user()->avatar_original }}" alt="">
                                <span class="flex min-w-0 flex-1 flex-col">
                                  <span class="truncate text-sm font-medium text-gray-900">{{ auth()->user()->name }}</span>
                                  <span class="truncate text-sm text-gray-500">{{ auth()->user()->email }}</span>
                                </span>
                              </span>
                              <svg class="h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                              </svg>
                            </span>
                        </button>
                    </div>

                    <div class="absolute left-0 right-0 z-10 mx-3 mt-1 origin-top divide-y divide-gray-200 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                    x-show="userMenu">
                        <div class="py-1" role="none">
                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-0">View profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-1">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-2">Notifications</a>
                        </div>
                        <div class="py-1" role="none">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-3">Get desktop app</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-4">Support</a>
                        </div>
                        <div class="py-1" role="none">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-5">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            @endauth

            @guest()
            <ul class="flex flex-col p-4 md:p-0 md:pr-4 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <a href="{{ route('login') }}" class="block py-2 px-0 text-sm text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700" aria-current="page">Login</a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 text-sm text-white bg-blue-700 hover:bg-indigo-700 transition-all rounded-full">
                        Register
                    </a>
                </li>
            </ul>
            @endguest
        </div>
    </div>
</nav>

