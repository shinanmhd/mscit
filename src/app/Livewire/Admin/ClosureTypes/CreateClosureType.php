<?php

namespace App\Livewire\Admin\ClosureTypes;

use App\Models\ClosureType;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class CreateClosureType extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    public function addAction(): Action
    {
        return CreateAction::make('add')
            ->label('Add Closure Type')
            ->form([
                TextInput::make('type'),
                ColorPicker::make('color'),
                Toggle::make('status'),
                RichEditor::make('detail'),
            ])
            ->successNotification(
                Notification::make()
                    ->success()
                    ->title('Success')
                    ->body('New closure type added.'),
            )
            ->model(ClosureType::class)
            ->after(function () {
                $this->dispatch('closure-type.created');
            })
            ->slideOver();
    }


    public function render()
    {
        return view('livewire.admin.closure-types.create-closure-type');
    }
}
