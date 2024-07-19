<div class="w-full flex-flex-col" x-init="initIncidentMap()">
    <div class="w-full p-4 flex items-center justify-between bg-slate-50">
        <h1 class="font-bold text-base">Create Road Closure</h1>

        <a wire:click="$dispatch('closeModal')" class="p-2 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
            </svg>
        </a>
    </div>

    {{--<div class="flex flex-col">
        <h1>SHAPE::{{$map_shape_type}}</h1>
        <h1>DATA::{{$map_shape_data}}</h1>
        <h1>LAT::{{$marker_lat}}</h1>
        <h1>LNG::{{$marker_lng}}</h1>
    </div>--}}
    <img src="{{ storage_path('mCBGd8Rzo4Ox7JxmE8fW5ys5NdzhlI-metaaW1nLnBuZw==-.png') }}" alt="">
    @if(!auth()->user())
        <div class="w-full h-full flex flex-col items-center justify-center py-8">
            <h1 class="text-lg">Please login to post incidents</h1>
        </div>
    @else
        <form wire:submit.prevent="saveClosure()">
            <div class="flex flex-col gap-y-4 p-6">
                <x-input label="Road Name" wire:model="work_road" />

                <x-select
                    label="Closure Type"
                    placeholder="Select a type of closure"
                    wire:model.defer="closure_type_id"
                >
                    @foreach($closure_types as $closure_type)
                        <x-select.option label="{{ $closure_type->type }}" value="{{ $closure_type->id }}" />
                    @endforeach
                </x-select>

                <x-textarea label="Detail" placeholder="detail of the road closure" wire:model="closure_detail" />

                <div class="flex items-center justify-center gap-x-6">
                    <x-datetime-picker
                        id="from-date"
                        label="From"
                        placeholder="Closure Start"
                        wire:model.defer="closure_from"
                        without-time-seconds="true"
                        disable-past-dates="true"
                        without-timezone="true"
                    />
                    <x-datetime-picker
                        id="to-date"
                        label="To"
                        placeholder="Closure End"
                        wire:model.defer="closure_to"
                        without-time-seconds="true"
                        disable-past-dates="true"
                        without-timezone="true"
                    />
                </div>

                <div class="w-full flex items-center justify-center py-4">
                    <livewire:dropzone
                        wire:model="images"
                        :rules="['image','mimes:png,jpeg','max:1020']"
                        :multiple="true" />
                </div>

                <div id="incident_map" style="height: 500px !important;" wire:ignore></div>
            </div>


            <div class="w-full p-4 flex items-center justify-end gap-x-2 bg-slate-50">
                <x-button gray flat wire:click="$dispatch('closeModal')" label="Cancel" />
                <x-button type="submit" lime label="Create" />
            </div>
        </form>
    @endif
</div>
