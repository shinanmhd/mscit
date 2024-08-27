<?php

namespace App\Livewire\Admin\Dashboard\Counts;

use App\Models\RoadClosures;
use Livewire\Component;

class TotalClosuresCount extends Component
{
    public $total = 0;

    public function mount()
    {
        $this->total = RoadClosures::count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.counts.total-closures-count');
    }
}
