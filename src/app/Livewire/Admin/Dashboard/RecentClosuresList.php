<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\RoadClosures;
use Carbon\Carbon;
use Livewire\Component;

class RecentClosuresList extends Component
{
    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.admin.dashboard.recent-closures-list')->with([
            'closures' => RoadClosures::
                where('created_at', '>=', Carbon::now()->subDay(2))
                ->orderBy('created_at', 'DESC')
                ->get()
                ->groupBy(function($date) {
                    return Carbon::parse($date->created_at)->format('Y-m-d'); // grouping by years
                })
        ]);
    }
}
