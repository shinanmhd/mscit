<div>
    <main class="">
        <div class="relative isolate overflow-hidden pt-12">
            <!-- Secondary navigation -->
            <header class="pb-4 pt-6 sm:pb-6">
                <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-6 px-4 sm:flex-nowrap sm:px-6 lg:px-8">

                    <div class="flex flex-col">
                        <h1 class="text-sm font-semibold leading-3 text-gray-500">Welcome back</h1>
                        <h1 class="text-xl font-bold leading-7 text-gray-900">{{ auth()->user()->name }}</h1>
                    </div>

                    <a wire:click="$dispatch('openModal', {component: 'user.create-road-closure'})"
                        class="ml-auto flex items-center gap-x-1 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">
                        <svg class="-ml-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.75 6.75a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" />
                        </svg>
                        New Road Closure
                    </a>
                </div>
            </header>

            <!-- Stats -->
            <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
                <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 lg:px-2 xl:px-0">
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8">
                        <dt class="text-sm font-medium leading-6 text-gray-500">Total Closures</dt>
                        <a href="{{ route('admin.closures.index') }}" class="text-xs font-medium text-blue-700 hover:underline">All Closures</a>
                        @livewire('admin.dashboard.counts.total-closures-count')
                    </div>
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:border-l sm:px-6 lg:border-t-0 xl:px-8">
                        <dt class="text-sm font-medium leading-6 text-gray-500">Active Closures</dt>
                        <a href="{{ route('admin.closures.index', ['active' => true]) }}" class="text-xs font-medium text-blue-700 hover:underline">Active Closures</a>
                        @livewire('admin.dashboard.counts.active-closures-count')
                    </div>
                    <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-l lg:border-t-0 xl:px-8">
                        <dt class="text-sm font-medium leading-6 text-gray-500">Users</dt>
                        <a href="{{ route('admin.users.index') }}" class="text-xs font-medium text-blue-700 hover:underline">Users</a>
                        @livewire('admin.dashboard.counts.users-count')
                    </div>
                    {{--<div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:border-l sm:px-6 lg:border-t-0 xl:px-8">
                        <dt class="text-sm font-medium leading-6 text-gray-500">Expenses</dt>
                        <dd class="text-xs font-medium text-rose-600">+10.18%</dd>
                        <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">$30,156.00</dd>
                    </div>--}}
                </dl>
            </div>

            <div class="absolute left-0 top-full -z-10 mt-96 origin-top-left translate-y-40 -rotate-90 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-ml-96 sm:-mt-10 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50" aria-hidden="true">
                <div class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#FF80B5] to-[#9089FC]" style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)"></div>
            </div>
        </div>

        <div class="space-y-16 py-16 xl:space-y-20">
            <!-- Recent activity table -->
            <div>
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">Recent activity</h2>
                </div>
                @livewire('admin.dashboard.recent-closures-list')
            </div>
        </div>
    </main>


    @push('scripts')
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7yU63yNaUg_A2Y8PYUw_uGITaBk8fsDc&libraries=drawing&callback=initMap" async></script>
    @endpush
</div>
