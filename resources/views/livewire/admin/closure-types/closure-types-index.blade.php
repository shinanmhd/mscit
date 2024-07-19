<div class="py-16 px-12">

    <div class="flex items-center justify-between pt-12">
        <h1 class="text-lg font-bold text-slate-800">Manage Closure Types</h1>
        @livewire('admin.closure-types.create-closure-type')
    </div>

    <div class="pt-6">
        {{ $this->table }}
    </div>
    <x-filament-actions::modals />
</div>
