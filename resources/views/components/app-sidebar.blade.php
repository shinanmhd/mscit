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

    <div class="h-screen bg-gray-900 transition-all duration-300 space-y-2 fixed sm:sticky top-0 z-50"
         x-bind:class="{'w-64':$store.sidebar.full, 'w-64 sm:w-20':!$store.sidebar.full,'top-0 left-0':$store.sidebar.navOpen,'top-0 -left-64 sm:left-0':!$store.sidebar.navOpen}">

        {{--<h1 class="text-white font-black py-4"
            x-bind:class="$store.sidebar.full ? 'text-2xl px-4' : 'text-xl px-4 xm:px-2'">GoFlow</h1>--}}

        <a href="{{ route('home') }}" class="flex items-center justify-center py-4" x-bind:class="$store.sidebar.full ? 'hidden' : 'flex'">
            <svg class="w-8 h-8" viewBox="0 0 222 171" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M107.71 3.33353e-05H70.87C70.87 3.33353e-05 0 4.57003 0 74.18C0 143.79 66.81 147.09 70.11 147.09C73.41 147.09 97.55 148.11 113.04 135.66V170.21C113.04 170.21 145.81 168.43 145.81 144.04V89.68C145.81 89.68 180.61 92.73 180.61 56.91H146.06V43.95C146.06 43.95 147.08 32.52 159.02 32.52H196.11C196.11 32.52 221.52 28.71 221.52 3.33353e-05H156.23C156.23 3.33353e-05 113.68 -0.249966 113.68 42.55V58.43H72.4C72.4 58.43 56.52 60.21 56.52 74.31C56.52 88.41 71.38 89.17 71.38 89.17H110.4C110.4 89.17 98.05 115.34 73.16 115.34C48.27 115.34 30.99 94.25 30.99 73.93C30.99 53.61 46.23 32.78 73.16 32.78C100.09 32.78 107.71 15.5 107.71 3.33353e-05Z" fill="white"/>
            </svg>
        </a>
        <a href="{{ route('home') }}" class="flex items-center justify-center py-4 gap-x-2" x-bind:class="$store.sidebar.full ? 'flex' : 'hidden'">
            <svg class="w-8 h-8" viewBox="0 0 222 171" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M107.71 3.33353e-05H70.87C70.87 3.33353e-05 0 4.57003 0 74.18C0 143.79 66.81 147.09 70.11 147.09C73.41 147.09 97.55 148.11 113.04 135.66V170.21C113.04 170.21 145.81 168.43 145.81 144.04V89.68C145.81 89.68 180.61 92.73 180.61 56.91H146.06V43.95C146.06 43.95 147.08 32.52 159.02 32.52H196.11C196.11 32.52 221.52 28.71 221.52 3.33353e-05H156.23C156.23 3.33353e-05 113.68 -0.249966 113.68 42.55V58.43H72.4C72.4 58.43 56.52 60.21 56.52 74.31C56.52 88.41 71.38 89.17 71.38 89.17H110.4C110.4 89.17 98.05 115.34 73.16 115.34C48.27 115.34 30.99 94.25 30.99 73.93C30.99 53.61 46.23 32.78 73.16 32.78C100.09 32.78 107.71 15.5 107.71 3.33353e-05Z" fill="white"/>
            </svg>
            <h1 class="text-2xl font-black text-white">GoFlow</h1>
        </a>

        <div class="px-4 space-y-2"
             x-data="{visible_class: 'absolute z-10 bg-slate-900 px-2 py-1 left-10 text-xs rounded-md'}"
        >

            <!-- SideBar Toggle -->
            <button @click="$store.sidebar.full = !$store.sidebar.full"
                    class="hidden sm:block focus:outline-none absolute p-1 -right-14 top-3 rounded-full h-12 w-12 mt-1 cursor-pointer">
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

            <!-- Home -->
            <div x-data="tooltip"
                 x-on:mouseover="show = true"
                 x-on:mouseleave="show = false"
                 @click="$store.sidebar.active = 'home' "
                 class=" relative flex items-center hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
                 x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-200 bg-gray-800':$store.sidebar.active == 'home','text-gray-400 ':$store.sidebar.active != 'home'}">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-6 w-6"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <h1 x-cloak
                    x-bind:class="!$store.sidebar.full && show ? visible_class :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                    Dashboard</h1>
            </div>

            <!-- Audience -->
            <div x-data="dropdown"
                 class="relative">
                <!-- Dropdown head -->
                <div @click="toggle('audience')"
                     x-data="tooltip"
                     x-on:mouseover="show = true"
                     x-on:mouseleave="show = false"
                     class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
                     x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full, 'text-gray-200 bg-gray-800':$store.sidebar.active == 'audience','text-gray-400 ':$store.sidebar.active != 'audience'}">
                    <div class="relative flex space-x-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-6 w-6"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <h1 x-cloak
                            x-bind:class="!$store.sidebar.full && show ? visible_class :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                            Audience</h1>
                    </div>
                    <svg x-cloak x-bind:class="$store.sidebar.full ? '':'sm:hidden'"
                         xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4"
                         viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd" />
                    </svg>
                </div>
                <!-- Dropdown content -->
                <div x-cloak x-show="open"
                     @click.outside="open =false"
                     x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                     class="text-gray-400 space-y-3 ">
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 1</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 2</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 3</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 4</h1>
                </div>
            </div>

            <!-- Posts -->
            <div @click="$store.sidebar.active = 'posts' "
                 x-data="tooltip"
                 x-on:mouseover="show = true"
                 x-on:mouseleave="show = false"
                 class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
                 x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-200 bg-gray-800':$store.sidebar.active == 'posts','text-gray-400 ':$store.sidebar.active != 'posts'}">
                <div class="flex  items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-6 w-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visible_class :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                        Posts</h1>
                </div>
                <h1 x-cloak x-bind:class="$store.sidebar.full ? '' :'sm:hidden'"
                    class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">8</h1>
            </div>

            <!-- Schedules -->
            <div @click="$store.sidebar.active = 'home' "
                 x-data="tooltip"
                 x-on:mouseover="show = true"
                 x-on:mouseleave="show = false"
                 class=" relative flex justify-between items-center text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
                 x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-200 bg-gray-800':$store.sidebar.active == 'schedules','text-gray-400 ':$store.sidebar.active != 'schedules'}">
                <div class="flex  items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-6 w-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h1 x-cloak
                        x-bind:class="!$store.sidebar.full && show ? visible_class :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                        Schedules</h1>
                </div>
                <div x-cloak x-bind:class="$store.sidebar.full ? '':'sm:hidden'"
                     class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-6 w-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1"
                              d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h1 class="w-5 h-5 p-1 bg-pink-400 rounded-sm text-sm leading-3 text-center text-gray-900">3
                    </h1>

                </div>
            </div>

            <!-- Income -->
            <div x-data="dropdown"
                 class="relative">
                <!-- Dropdown head -->
                <div @click="toggle('income')"
                     x-data="tooltip"
                     x-on:mouseover="show = true"
                     x-on:mouseleave="show = false"
                     class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
                     x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-200 bg-gray-800':$store.sidebar.active == 'income','text-gray-400 ':$store.sidebar.active != 'income'}">
                    <div class="relative flex space-x-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-6 w-6"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        <h1 x-cloak
                            x-bind:class="!$store.sidebar.full && show ? visible_class :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                            Income</h1>
                    </div>
                    <svg x-cloak x-bind:class="$store.sidebar.full ? '':'sm:hidden'"
                         xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4"
                         viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd" />
                    </svg>
                </div>
                <!-- Dropdown content -->
                <div x-cloak x-show="open"
                     @click.outside="open=false"
                     x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                     class="text-gray-400 space-y-3">
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 1</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 2</h1>
                    <!-- Sub Dropdown  -->
                    <div x-data="sub_dropdown"
                         class="relative w-full ">
                        <div @click="sub_toggle()"
                             class="flex items-center justify-between cursor-pointer">
                            <h1 class="hover:text-gray-200 cursor-pointer">Item 3</h1>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-4 w-4"
                                 viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div x-show="sub_open"
                             @click.outside="sub_open = false"
                             x-bind:class="$store.sidebar.full ? sub_expandedClass:sub_shrinkedClass">
                            <h1 class="hover:text-gray-200 cursor-pointer ">Sub Item 1</h1>
                            <h1 class="hover:text-gray-200 cursor-pointer ">Sub Item 2</h1>
                            <h1 class="hover:text-gray-200 cursor-pointer ">Sub Item 3</h1>
                        </div>
                    </div>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 4</h1>
                </div>
            </div>

            <!-- Promote -->
            <div x-data="dropdown"
                 class="relative">
                <!-- Dropdown head -->
                <div @click="toggle('promote')"
                     x-data="tooltip"
                     x-on:mouseover="show = true"
                     x-on:mouseleave="show = false"
                     class="flex justify-between text-gray-400 hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
                     x-bind:class="{'justify-start': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full,'text-gray-200 bg-gray-800':$store.sidebar.active == 'promote','text-gray-400 ':$store.sidebar.active != 'promote'}">
                    <div class="relative flex space-x-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-6 w-6"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                        <h1 x-cloak
                            x-bind:class="!$store.sidebar.full && show ? visible_class :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                            Promote</h1>
                    </div>
                    <svg x-cloak x-bind:class="$store.sidebar.full ? '':'sm:hidden'"
                         xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4"
                         viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd" />
                    </svg>
                </div>
                <!-- Dropdown content -->
                <div x-cloak x-show="open"
                     @click.outside="open=false"
                     x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                     class="text-gray-400 space-y-3">
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 1</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 2</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 3</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 4</h1>
                </div>
            </div>
        </div>
    </div>
