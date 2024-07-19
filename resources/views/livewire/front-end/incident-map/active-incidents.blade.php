<div class="h-full relative">

    <div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/4 z-50 flex-col items-center justify-center hidden"
         wire:loading.class.remove="hidden" wire:loading.class="flex">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-400 dark:text-zinc-50 animate-spin">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
        </svg>
        <h1 class="text-xs text-gray-400 dark:text-zinc-200 mt-1">Loading</h1>
    </div>


    @if($loading)
        <div class="flex-col flex">
            <div class="pt-24 bg-gray-300/20 dark:bg-zinc-900/50 px-4 pb-2 w-full">
                <div class="flex items-center justify-between opacity-0">
                    <h1 class="text-lg font-bold text-white">&nbsp;</h1>

                    <a onclick="closeActiveIncidents()" class="cursor-pointer p-2 z-50 text-zinc-900 dark:text-white" wire:click="closeDetails()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <div class="absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/4 z-50 flex flex-col items-center justify-center" wire:loading.class="hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-700 dark:text-zinc-50 animate-spin">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    <h1 class="text-xs text-gray-800 dark:text-zinc-200 mt-1">Loading</h1>
                </div>
            </div>
        </div>
    @else
        <div class="flex-col flex transition-all duration-200" wire:loading.class="opacity-10 relative">
            <div class="pt-24 bg-gray-300/20 dark:bg-zinc-800 border-b border-gray-300/40 dark:border-zinc-900 px-4 pb-2 w-full sticky top-0 z-10">
                <div class="flex items-center justify-between">
                    <h1 class="text-lg font-bold text-zinc-900 dark:text-white" wire:loading.class="opacity-0">Active Road Closures</h1>

                    <a onclick="closeActiveIncidents()" class="cursor-pointer p-2 z-[99999] text-zinc-900 dark:text-white" wire:click="closeDetails()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="flex flex-col gap-y-4">
                <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($closures as $closure)
                    <li class="py-3 px-4 flex flex-col cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-100/10 transition-all"
                        wire:click="$dispatch('front-end::show_incident_slide_over', { incident_id: {{ $closure->id }} })"
                    >
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">

                            {{-- TODO show user avatar when profile update feature is complete
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                            </div>--}}
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $closure->work_road }}
                                </p>
                                <div class="flex items-center">
                                    <p class="text-xs font-semibold text-gray-400 dark:text-gray-400">By:</p>
                                    <a class="text-xs text-blue-500 truncate dark:text-blue-500">
                                        {{-- TODO onclick show user profile --}}
                                        {{ $closure->user->name }}
                                    </a>
                                </div>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <span class="text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded bg-gray-200/30 dark:bg-white/10"
                                style="color: {{ $closure->closureType->color }};">
                                    {{ $closure->closureType->type }}
                                </span>
                            </div>
                        </div>

                        <div class="py-2 my-2 flex items-center justify-between rounded">
                            <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                From: {{ \Carbon\Carbon::make($closure->closure_from)->format('D, d M Y') }}
                            </span>
                            <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                To: {{ \Carbon\Carbon::make($closure->closure_to)->format('D, d M Y') }}
                            </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
