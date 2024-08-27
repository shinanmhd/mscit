<div class="py-16 px-12">

    <div class="flex items-center justify-between pt-12">
        <h1 class="text-lg font-bold text-slate-800">Manage{{ $filter_active ? ' Active ' : ' ' }}Road Closures</h1>
    </div>

    <div class="pt-6">
        {{ $this->table }}
    </div>
    <x-filament-actions::modals />
</div>
