<x-app-layout>

    <div class="w-full bg-slate-50 pt-56 min-h-screen">
        {{ auth()->user()->profile->isComplete() ? 'COMPLETE' : 'NOOOOT COMPLETE' }}
    </div>

</x-app-layout>
