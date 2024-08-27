<x-app-layout>
    <div class="h-12"></div>

    @if(auth()->user()->hasRole('admin'))
        @livewire('admin.dashboard.admin-dashboard-index')
    @else
    @endif
</x-app-layout>
