<?php

namespace App\Livewire\FrontEnd\IncidentMap;

use App\Models\RoadClosures;
use Livewire\Attributes\On;
use Livewire\Component;

class IncidentDetails extends Component
{
    public $loading = true;
    public RoadClosures $closure;

    #[On('front-end::load_incident')]
    public function load_incident($id)
    {
        $this->closure = RoadClosures::find($id);
        $this->loading = false;
    }

    public function closeDetails()
    {
        $this->loading = true;
    }

    public function render()
    {
        return view('livewire.front-end.incident-map.incident-details');
    }
}
