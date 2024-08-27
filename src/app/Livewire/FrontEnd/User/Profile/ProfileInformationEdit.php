<?php

namespace App\Livewire\FrontEnd\User\Profile;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class ProfileInformationEdit extends Component
{
    use WireUiActions;

    public $user;
    public $profile;

    protected $rules = [
        'profile.phone' => 'required',
        'profile.bio' => 'required',
    ];

    public function mount()
    {
        $this->user          = Auth::user()->toArray();
        $this->profile       = Auth::user()->profile->toArray();
    }

    public function save()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $profile = Profile::where('user_id', $this->user['id'])->first();
                $profile->fill($this->profile);
                $profile->save();
            });
        }
        catch (\Exception $e) {
            $this->notification()->send([
                'icon' => 'error',
                'title' => 'Error!',
                'description' => 'There was an error while saving your data.'.$e,
            ]);
            return false;
        }

        $this->notification()->send([
            'icon' => 'info',
            'title' => 'Success!',
            'description' => 'Your profile has been updated.',
        ]);
    }

    public function render()
    {
        return view('livewire.front-end.user.profile.profile-information-edit');
    }
}
