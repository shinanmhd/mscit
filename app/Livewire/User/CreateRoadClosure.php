<?php

namespace App\Livewire\User;

use App\Events\ClosureAdded;
use App\Models\ClosureType;
use App\Models\RoadClosures;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\WireUiActions;

class CreateRoadClosure extends ModalComponent
{
    use WireUiActions;
    use WithFileUploads;

    #[Validate('required')]
    public $map_shape_type;
    public $map_shape_data;
    public $marker_lat;
    public $marker_lng;


    public $given_to;
    public $work_location;
    public $work_road;

    #[Validate('required')]
    public $closure_type_id;
    public $closure_detail;

    #[Validate('required')]
    public $closure_from;
    public $closure_to;

    public array $images = [];

    public $closure_types;

    public function mount()
    {
        $this->closure_types = ClosureType::where('status', true)->get();
    }

    #[On('update_map_shape')]
    public function updateMapShape($shape_type, $shape_data, $marker_lat = null, $marker_lng = null)
    {
        $this->map_shape_type = $shape_type;
        $this->map_shape_data = $shape_data;
        $this->marker_lat     = $marker_lat;
        $this->marker_lng     = $marker_lng;
    }

    public function saveClosure()
    {
        $this->validate();


        try {
            DB::transaction(function() {
                $path_data = json_decode($this->map_shape_data, true);
                $this->map_shape_type = str_replace('"', '', $this->map_shape_type);

                $road_closure = new RoadClosures([
                    /*'given_to'        => ,*/
                    'work_location'   => $this->work_location,
                    'work_road'       => $this->work_road,
                    'closure_type_id' => $this->closure_type_id,
                    'closure_detail'  => $this->closure_detail,
                    'closure_from'    => $this->closure_from,
                    'closure_to'      => $this->closure_to,
                    'shape'           => $this->map_shape_type,
                    'shape_data'      => $this->map_shape_type === "polygon" ? json_encode($path_data['paths']) : json_encode([]),
                    'lat'             => $this->marker_lat,
                    'lng'             => $this->marker_lng,
                    'created_by'      => Auth::user()->id,
                ]);
                $road_closure->save();

                /*
                 * if there were no errors upload the images
                 * */
                foreach ($this->images as $image)
                {
                    $road_closure->addMediaFromDisk('/livewire-tmp/'.$image['tmpFilename'], 'local')
                        ->toMediaCollection('incident_images');
                }

                ClosureAdded::dispatch($road_closure);
            });
        }
        catch (\Exception $exception)
        {
            dd($exception);
            $this->notification([
                'title'       => "Error!",
                'description' => "An error occurred while submitting your request.",
                'icon'        => 'error'
            ]);
            return false;
        }


        $this->notification()->send([
            'icon' => 'info',
            'title' => 'Success!',
            'description' => 'Your Closure has been added.',
        ]);

        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }
    public static function closeModalOnClickAway(): bool
    {
        return true;
    }
    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public static function destroyOnClose(): bool
    {
        return true;
    }

    public function render()
    {
        return view('livewire.user.create-road-closure');
    }
}
