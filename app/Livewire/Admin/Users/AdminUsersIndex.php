<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AdminUsersIndex extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function mount()
    {
//        $role = Role::findByName('admin');
//
//        $user = User::find(5);
//        $user->assignRole($role);
//        dd($user->roles);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())
            ->columns([
                ImageColumn::make('avatar')->circular(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('email'),

                TextColumn::make('roles.name')
                    ->default('No Role')
                    ->badge(),

                TextColumn::make('provider'),
                TextColumn::make('created_at')
                    ->label('Registered On'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')
                    ->label('edit')
                    ->form([
                        TextInput::make('name'),
                        TextInput::make('email'),

                        Select::make('role')
                            ->options(Role::all()->pluck('name', 'name'))
                            ->saveRelationshipsUsing(function (User $user, $state) {
                                $user->syncRoles([$state]);
                            })
                    ]),

                DeleteAction::make('delete')
                    ->requiresConfirmation()
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.users.admin-users-index');
    }
}
