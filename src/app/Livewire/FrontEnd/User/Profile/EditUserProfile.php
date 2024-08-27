<?php

namespace App\Livewire\FrontEnd\User\Profile;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditUserProfile extends Component
{
    public $isProfileComplete = false;

    public function mount()
    {
        $this->isProfileComplete = Profile::where('user_id', Auth::user()->id)->first()->isComplete();
    }

    public function render()
    {
        return view('livewire.front-end.user.profile.edit-user-profile');
    }
}
