<?php

namespace App\Livewire\FrontEnd\IncidentMap;

use App\Models\RoadClosures;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class ActiveIncidents extends Component
{
    public $loading = true;
    public $closures;

    #[On('front-end::show_all_incidents')]
    public function load_incidents(): void
    {
        $this->closures = RoadClosures::with('closureType', 'user')
            ->where('closure_to', '>', Carbon::now())
            ->get();

        $this->loading = false;
    }
    /*public function showIncidentDetails($incident)
    {
        $this->loading = true;
    }*/

    public function closeDetails()
    {
        $this->loading = true;
    }

    public function render()
    {
        return view('livewire.front-end.incident-map.active-incidents');
    }
}
