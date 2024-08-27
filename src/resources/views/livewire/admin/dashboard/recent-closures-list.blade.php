<div class="mt-6 overflow-hidden border-t border-gray-100">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
            <table class="w-full text-left">
                <thead class="sr-only">
                <tr>
                    <th>Amount</th>
                    <th class="hidden sm:table-cell">Client</th>
                    <th>More details</th>
                </tr>
                </thead>
                <tbody>
                @foreach($closures as $key => $closure_day)
                    {{--@dd($key, $closure_day)--}}
                    <tr class="text-sm leading-6 text-gray-900">
                        <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                            <time datetime="2023-03-22">
                                {{ \Carbon\Carbon::make($key)->isToday() ? 'Today' : 'Yesterday' }}
                            </time>
                            <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
                            <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
                        </th>
                    </tr>

                    @foreach($closure_day as $closure)
                        <tr>
                            <td class="relative py-5 pr-6">
                                <div class="flex gap-x-6">
                                    <svg class="hidden h-6 w-5 flex-none text-gray-400 sm:block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-.75-4.75a.75.75 0 001.5 0V8.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0L6.2 9.74a.75.75 0 101.1 1.02l1.95-2.1v4.59z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="flex-auto">
                                        <div class="flex items-start gap-x-3">
                                            <div class="text-sm font-medium leading-6 text-gray-900">{{ $closure->work_road }}</div>
                                            <div class="rounded-md px-2 py-1 text-xs font-medium text-gray-900"
                                            style="background-color: {{ $closure->closureType->color }}">
                                                {{ $closure->closureType->type }}
                                            </div>
                                        </div>
                                        <div class="mt-1 text-xs leading-5 text-gray-500">{{ substr($closure->closure_detail, 0, 100) }}</div>
                                    </div>
                                </div>
                                <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></div>
                                <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
                            </td>
                            <td class="hidden py-5 pr-6 sm:table-cell">
                                <div class="text-sm leading-6 text-gray-900">By: {{ $closure->user->name }}</div>
                                <div class="py-2 my-2 flex items-center justify-start rounded">
                                    <div class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                        From: {{ \Carbon\Carbon::make($closure->closure_from)->format('D, d M Y H:i') }}
                                    </div>
                                    <div class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                        To: {{ \Carbon\Carbon::make($closure->closure_to)->format('D, d M Y H:i') }}
                                    </div>
                                </div>
                            </td>
                            <td class="py-5 text-right">
                                <div class="flex justify-center">
                                    <a wire:click="$dispatch('openModal', {component: 'front-end::load_incident', arguments: {id: {{ $closure->id }}} } )"
                                       class="text-sm font-medium leading-6 text-indigo-600 hover:text-indigo-500 cursor-pointer">View<span class="hidden sm:inline"> closure</span><span class="sr-only">, invoice #00012, Reform</span></a>
                                </div>
                                <div class="flex items-center justify-center py-1">
                                    @if(\Carbon\Carbon::make($closure->closure_from) < \Carbon\Carbon::now() && \Carbon\Carbon::make($closure->closure_to) >= \Carbon\Carbon::now())
                                        <div class="flex items-center justify-center px-2 py-1 rounded-full bg-lime-100 gap-x-2">
                                            <div class="w-2 h-2 rounded-full bg-lime-600 animate-pulse">&nbsp;</div>
                                            <h1 class="text-xs font-bold text-lime-950">Active</h1>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
