<?php

namespace App\Livewire\Admin\Dashboard\Counts;

use App\Models\User;
use Livewire\Component;

class UsersCount extends Component
{
    public $userCount = 0;

    public function mount()
    {
        $this->userCount = User::count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.counts.users-count');
    }
}
