<div class="py-16 px-12">

    @if(!$isProfileComplete)
        <div class="px-0 md:px-0 py-4 md:py-12">
            <x-alert title="Profile Incomplete!" info padding="large">
                <x-slot name="slot">
                    Please complete your profile to start reporting incidents on the platform.
                </x-slot>
            </x-alert>
        </div>
    @endif

    <div class="divide-y divide-gray-900/10">

        @livewire('front-end.user.profile.basic-information-edit')

        @livewire('front-end.user.profile.profile-information-edit')

    </div>

</div>
