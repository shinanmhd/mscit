<div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3 py-12">
    <div class="px-4 sm:px-0">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>
    </div>

    <form wire:submit.prevent="save()" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
        <div class="px-4 py-6 sm:p-8">
            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class="sm:col-span-6">
                    <div class="mt-2">
                        <x-input label="Name" wire:model="user.name" />
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <div class="mt-2">
                        <x-input label="Email" disabled wire:model="user.email" />
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <div class="mt-2">
                        <x-select
                            label="Country"
                            placeholder="Select Country"
                            wire:model.live="profile.country_id"
                            x-init="setTimeout( () => $wire.set('profile.country_id', {{ $profile['country_id'] }}) ) ,100)"
                            x-on:selected="setTimeout( () => $wire.set('profile.country_id', $event.target.value) ) ,100)"
                        >
                            <x-select.option label="Select Country" disabled />
                            <x-select.option label="Maldives" value="1" />
                        </x-select>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <div class="mt-2">
                        <x-select
                            label="Atoll"
                            placeholder="Select Atoll"
                            wire:model.live="profile.atoll"
                            {{--x-init="setTimeout( () => $wire.set('profile.country_id', {{ $profile['atoll'] }}) ) ,100)"--}}
                            {{--x-on:selected="setTimeout(() => $wire.setSelectedAtoll($event.target.value), 100)"--}}
                            x-on:selected="setTimeout(() => $wire.call('setSelectedAtoll', $event.target.value), 100)"
                        >
                            <x-select.option label="Select Atoll" />
                            @foreach($atolls as $atoll => $islands)
                                <x-select.option label="{{ $atoll }} Atoll" value="{{ $atoll }}" />
                            @endforeach
                        </x-select>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <div class="mt-2">
                        <x-select
                            label="Island"
                            placeholder="Select Island"
                            wire:model.live="profile.island_id"
                            x-init="setTimeout( () => $wire.set('profile.island_id', {{ $profile['island_id'] }}) ) ,400)"
                            x-on:selected="setTimeout( () => $wire.set('profile.island_id', $event.target.value) ) ,100)"
                        >
                            <x-select.option label="Select Island" disabled />
                            @foreach($atoll_islands as $key => $island)
                                <x-select.option label="{{ $island['name'] }}" value="{{ $island['id'] }}" />
                            @endforeach
                        </x-select>
                    </div>
                </div>

                <div class="col-span-full">
                    <div class="mt-2">
                        <x-input wire:model="profile.location" label="Address" autocomplete="street-address" />
                    </div>
                </div>

            </div>
        </div>
        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</div>
