    <!-- Mobile Menu Toggle -->
    <button @click="$store.sidebar.navOpen = !$store.sidebar.navOpen"
            class="sm:hidden absolute top-5 right-5 focus:outline-none z-50">
        <!-- Menu Icons -->
        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-6 w-6"
             x-bind:class="$store.sidebar.navOpen ? 'hidden':''"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16m-7 6h7" />
        </svg>

        <!-- Close Menu -->
        <svg x-cloak
             xmlns="http://www.w3.org/2000/svg"
             class="h-6 w-6"
             x-bind:class="$store.sidebar.navOpen ? '':'hidden'"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <div class="h-screen flex flex-col bg-gray-900 transition-all duration-300 space-y-2 fixed sm:sticky top-0 z-[50]"
         x-cloak
         x-bind:class="{'w-64':$store.sidebar.full, 'w-64 sm:w-20':!$store.sidebar.full,'top-0 left-0':$store.sidebar.navOpen,'top-0 -left-64 sm:left-0':!$store.sidebar.navOpen}">

        {{--<h1 class="text-white font-black py-4"
            x-bind:class="$store.sidebar.full ? 'text-2xl px-4' : 'text-xl px-4 xm:px-2'">GoFlow</h1>--}}



        <div class="px-4 space-y-2 flex flex-col grow pb-4"
             x-data="{visible_class: 'absolute z-10 bg-slate-900 px-2 py-1 left-10 text-xs rounded-md'}"
        >

            <!-- SideBar Toggle -->
            <button @click="$store.sidebar.full = !$store.sidebar.full"
                    class="hidden sm:block focus:outline-none absolute p-1 -right-14 top-3 rounded-full h-12 w-12 mt-1.5 cursor-pointer">
                <div class="menu-link-wrapper w-full mt-0 pt-0">
                    <div class="" x-bind:class="$store.sidebar.full ? 'menu-trigger-open':'menu-link '">
                        <span class="lines"></span>
                    </div>
                </div>
            </button>
            {{--<button @click="$store.sidebar.full = !$store.sidebar.full"
                    class="hidden sm:block focus:outline-none absolute p-1 -right-3 top-10 bg-gray-900 rounded-full shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4 transition-all duration-300 text-white transform"
                     x-bind:class="$store.sidebar.full ? 'rotate-90':'-rotate-90 '"
                     viewBox="0 0 20 20"
                     fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd" />
                </svg>
            </button>--}}


            <div class="flex h-16 shrink-0 items-center"
                 x-bind:class="{'justify-start': $store.sidebar.full, 'justify-center':!$store.sidebar.full}">
                <a href="{{ route('home') }}" class="flex items-center justify-center py-4 z-[9999]" x-bind:class="$store.sidebar.full ? 'hidden' : 'flex'">
                    <svg class="w-8 h-8" viewBox="0 0 222 171" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M107.71 3.33353e-05H70.87C70.87 3.33353e-05 0 4.57003 0 74.18C0 143.79 66.81 147.09 70.11 147.09C73.41 147.09 97.55 148.11 113.04 135.66V170.21C113.04 170.21 145.81 168.43 145.81 144.04V89.68C145.81 89.68 180.61 92.73 180.61 56.91H146.06V43.95C146.06 43.95 147.08 32.52 159.02 32.52H196.11C196.11 32.52 221.52 28.71 221.52 3.33353e-05H156.23C156.23 3.33353e-05 113.68 -0.249966 113.68 42.55V58.43H72.4C72.4 58.43 56.52 60.21 56.52 74.31C56.52 88.41 71.38 89.17 71.38 89.17H110.4C110.4 89.17 98.05 115.34 73.16 115.34C48.27 115.34 30.99 94.25 30.99 73.93C30.99 53.61 46.23 32.78 73.16 32.78C100.09 32.78 107.71 15.5 107.71 3.33353e-05Z" fill="white"/>
                    </svg>
                </a>
                <a href="{{ route('home') }}" class="flex items-center justify-center py-4 gap-x-2 z-[9999]" x-bind:class="$store.sidebar.full ? 'flex' : 'hidden'">
                    <svg class="w-8 h-8" viewBox="0 0 222 171" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M107.71 3.33353e-05H70.87C70.87 3.33353e-05 0 4.57003 0 74.18C0 143.79 66.81 147.09 70.11 147.09C73.41 147.09 97.55 148.11 113.04 135.66V170.21C113.04 170.21 145.81 168.43 145.81 144.04V89.68C145.81 89.68 180.61 92.73 180.61 56.91H146.06V43.95C146.06 43.95 147.08 32.52 159.02 32.52H196.11C196.11 32.52 221.52 28.71 221.52 3.33353e-05H156.23C156.23 3.33353e-05 113.68 -0.249966 113.68 42.55V58.43H72.4C72.4 58.43 56.52 60.21 56.52 74.31C56.52 88.41 71.38 89.17 71.38 89.17H110.4C110.4 89.17 98.05 115.34 73.16 115.34C48.27 115.34 30.99 94.25 30.99 73.93C30.99 53.61 46.23 32.78 73.16 32.78C100.09 32.78 107.71 15.5 107.71 3.33353e-05Z" fill="white"/>
                    </svg>
                    <h1 class="text-2xl font-black text-white">GoFlow</h1>
                </a>
            </div>
            <nav class="flex flex-1 grow flex-col">
                <ul role="list" class="flex flex-1 flex-col gap-y-7">
                    <li>
                        <ul role="list" class="-mx-2 space-y-1">
                            <li>
                                <a href="{{ route('home') }}"
                                   class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 {{ Route::is('home') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}"
                                   x-bind:class="{'justify-start': $store.sidebar.full, 'justify-center':!$store.sidebar.full}">
                                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    <h1 class="" x-bind:class="{'flex': $store.sidebar.full, 'hidden':!$store.sidebar.full}">
                                        Home
                                    </h1>
                                </a>
                            </li>
                            <li>
                                <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                                <a href="{{ route('dashboard') }}"
                                   class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 {{ Route::is('dashboard') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}"
                                   x-bind:class="{'justify-start': $store.sidebar.full, 'justify-center':!$store.sidebar.full}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
                                    </svg>
                                    <h1 class="" x-bind:class="{'flex': $store.sidebar.full, 'hidden':!$store.sidebar.full}">
                                        Dashboard
                                    </h1>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.users.index') }}"
                                   class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 {{ Route::is('admin.users.index') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}"
                                   x-bind:class="{'justify-start': $store.sidebar.full, 'justify-center':!$store.sidebar.full}">
                                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                    </svg>
                                    <h1 class="" x-bind:class="{'flex': $store.sidebar.full, 'hidden':!$store.sidebar.full}">
                                        Users
                                    </h1>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.closure-types.index') }}"
                                   class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 {{ Route::is('admin.closure-types.index') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}"
                                   x-bind:class="{'justify-start': $store.sidebar.full, 'justify-center':!$store.sidebar.full}">
                                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                                    </svg>
                                    <h1 class="" x-bind:class="{'flex': $store.sidebar.full, 'hidden':!$store.sidebar.full}">
                                        Closure Types
                                    </h1>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.closures.index') }}"
                                    class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 {{ Route::is('admin.closures.index') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}"
                                    x-bind:class="{'justify-start': $store.sidebar.full, 'justify-center':!$store.sidebar.full}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                                    </svg>

                                    <h1 class="" x-bind:class="{'flex': $store.sidebar.full, 'hidden':!$store.sidebar.full}">
                                        Road Closures
                                    </h1>
                                </a>
                            </li>
                            {{--<li>
                                <a href="#" class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white"
                                    x-bind:class="{'justify-start': $store.sidebar.full, 'justify-center':!$store.sidebar.full}">
                                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>
                                    <h1 class="" x-bind:class="{'flex': $store.sidebar.full, 'hidden':!$store.sidebar.full}">
                                        Calendar
                                    </h1>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white"
                                    x-bind:class="{'justify-start': $store.sidebar.full, 'justify-center':!$store.sidebar.full}">
                                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                                    </svg>
                                    <h1 class="" x-bind:class="{'flex': $store.sidebar.full, 'hidden':!$store.sidebar.full}">
                                        Reports
                                    </h1>
                                </a>
                            </li>--}}
                        </ul>
                    </li>
                    {{--<li>
                        <div class="text-xs font-semibold leading-6 text-gray-400">Your teams</div>
                        <ul role="list" class="-mx-2 mt-2 space-y-1">
                            <li>
                                <a href="#" class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white"
                                    x-bind:class="{'justify-start': $store.sidebar.full, 'justify-center':!$store.sidebar.full}">
                                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">H</span>
                                    <span class="truncate" x-bind:class="{'flex': $store.sidebar.full, 'hidden':!$store.sidebar.full}">Heroicons</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white"
                                    x-bind:class="{'justify-start': $store.sidebar.full, 'justify-center':!$store.sidebar.full}">
                                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">T</span>
                                    <span class="truncate" x-bind:class="{'flex': $store.sidebar.full, 'hidden':!$store.sidebar.full}">Tailwind Labs</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white"
                                    x-bind:class="{'justify-start': $store.sidebar.full, 'justify-center':!$store.sidebar.full}">
                                    <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">W</span>
                                    <span class="truncate" x-bind:class="{'flex': $store.sidebar.full, 'hidden':!$store.sidebar.full}">Workcation</span>
                                </a>
                            </li>
                        </ul>
                    </li>--}}
                    <li class="mt-auto">
                        <a href="#" class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white"
                           x-bind:class="{'justify-start': $store.sidebar.full, 'justify-center':!$store.sidebar.full}">
                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <h1 class="" x-bind:class="{'flex': $store.sidebar.full, 'hidden':!$store.sidebar.full}">
                                Settings
                            </h1>
                        </a>
                    </li>
                </ul>
            </nav>


        </div>
    </div>
