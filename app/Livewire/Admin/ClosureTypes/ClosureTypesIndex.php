<?php

namespace App\Livewire\Admin\ClosureTypes;

use App\Models\ClosureType;
use App\Models\User;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ClosureTypesIndex extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(ClosureType::query())
            ->columns([
                TextColumn::make('type')->searchable(),
                TextColumn::make('detail')->html(),

                ColorColumn::make('color'),
                IconColumn::make('status')->boolean(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')
                    ->label('edit')
                    ->form([
                        TextInput::make('type'),
                        ColorPicker::make('color'),
                        Toggle::make('status'),
                        RichEditor::make('detail'),
                    ]),

                /*DeleteAction::make('delete')
                    ->requiresConfirmation()*/
            ])
            ->bulkActions([
                // ...
            ]);
    }

    #[On('closure-type.created')]
    public function render()
    {
        return view('livewire.admin.closure-types.closure-types-index');
    }
}
