<?php

namespace App\Livewire\FrontEnd\User\Profile;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class BasicInformationEdit extends Component
{
    use WireUiActions;

    public $user;
    public $profile;
    public $atolls;
    public $atoll_islands = [];


    protected $rules = [
        'user.name' => 'required',
    ];

    public function mount()
    {
        $this->user          = Auth::user()->toArray();
        $this->profile       = Auth::user()->profile->toArray();

        $this->atolls        = maldivesAtollsIslands();

        // if atoll exist for user load the islands for the atoll
        if (isset($this->profile['atoll']) && strlen($this->profile['atoll']) > 0)
            $this->setSelectedAtoll();
    }

    public function setSelectedAtoll()
    {
        $this->atoll_islands = $this->atolls[$this->profile['atoll']];
    }

    public function save()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $user = \App\Models\User::find($this->user['id']);
                $user->fill($this->user);
                $user->save();

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
        return view('livewire.front-end.user.profile.basic-information-edit');
    }
}
