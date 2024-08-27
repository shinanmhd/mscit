<?php

namespace App\Livewire\Admin;

use App\Models\ClosureType;
use App\Models\RoadClosures;
use Carbon\Carbon;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Query\Builder;
use Livewire\Attributes\Url;
use Livewire\Component;

class RoadClosuresList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    #[Url(as: 'active')]
    public $filter_active = false;

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getQuery())
            ->columns([
                TextColumn::make('work_road')->searchable(),
                TextColumn::make('closure_detail'),

                TextColumn::make('closure_from')->date('D, d M Y H:i'),
                TextColumn::make('closure_to')->date('D, d M Y H:i'),

                TextColumn::make('closureType.type')
                    ->badge()
                    ->color(Color::Gray),
                TextColumn::make('shape'),

            ])
            ->filters([
                Filter::make('is_active')
                    ->query(function($query) {
                        $currentDateTime = Carbon::now();
                        $query->where('closure_to', '>', $currentDateTime);
                    })
            ])
            ->actions([
                EditAction::make('edit')
                    ->label('edit')
                    ->form([
                        TextInput::make('work_road'),
                        Textarea::make('closure_detail'),
                        DatePicker::make('closure_from'),
                        DatePicker::make('closure_to'),
                        Select::make('closure_type_id')
                            ->options(ClosureType::all()->pluck('type', 'id'))
                    ]),

                /*DeleteAction::make('delete')
                    ->requiresConfirmation()*/
            ])
            ->bulkActions([
                // ...
            ]);
    }

    private function getQuery()
    {
        /*if ($this->filter_active) {
            $currentDateTime = Carbon::now();
            return RoadClosures::query()->where('closure_to', '>', $currentDateTime);
        }*/

        return RoadClosures::query()->when($this->filter_active, function ($query) {
            $currentDateTime = Carbon::now();
            $query->where('closure_to', '>', $currentDateTime);
        });
    }

    public function render()
    {
        return view('livewire.admin.road-closures-list');
    }
}
