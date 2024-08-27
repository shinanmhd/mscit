<?php

namespace App\Livewire\Admin\Dashboard\Counts;

use App\Models\RoadClosures;
use Carbon\Carbon;
use Livewire\Component;

class ActiveClosuresCount extends Component
{
    public $activeTotal = 0;

    public function mount()
    {
        $currentDateTime = Carbon::now();

        $this->activeTotal = RoadClosures::with('closureType')
            ->where('closure_to', '>', $currentDateTime)
            ->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.counts.active-closures-count');
    }
}
