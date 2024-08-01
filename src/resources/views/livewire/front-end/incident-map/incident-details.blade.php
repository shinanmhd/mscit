<div class="h-full relative soft-scrollbar">

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

                    <a onclick="closeIncidentDetail()" class="cursor-pointer p-2 z-50 text-zinc-900 dark:text-white" wire:click="closeDetails()">
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
        <div class="flex-col flex transition-all duration-200 soft-scrollbar" wire:loading.class="opacity-10 relative">
            <div class="pt-24 bg-gray-300/20 dark:bg-zinc-800 border-b border-gray-300/40 dark:border-zinc-900 px-4 pb-2 w-full sticky top-0 z-10">
                <div class="flex items-center justify-between">
                    <h1 class="text-lg font-bold text-zinc-900 dark:text-white" wire:loading.class="opacity-0">{{ $closure->work_road }}</h1>

                    <a onclick="closeIncidentDetail()" class="cursor-pointer p-2 z-[99999] text-zinc-900 dark:text-white" wire:click="closeDetails()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="flex flex-col p-4 gap-y-4">
                <div class="w-full text-sm text-zinc-700 dark:text-gray-200">{!! $closure->closure_detail !!}</div>

                @if(count($closure->getMedia("incident_images")))
                    {{ $closure->getMedia("incident_images")[0] }}
                @else
                    {{--<div class="aspect-[16/9] w-full bg-gray-600 rounded flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-auto text-gray-400">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                        </svg>
                    </div>--}}
                @endif


            </div>
            <livewire:comments :model="$closure" wire:key="closure_{{$closure->id}}"/>
        </div>
    @endif
</div>
