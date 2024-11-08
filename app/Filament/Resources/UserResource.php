<?php

namespace App\Filament\Resources;

use App\Containers\AppSection\User\Models\User;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected  static  ?string $navigationLabel = 'Пользователи';
    protected  static  ?string $modelLabel = 'Пользователи';

    protected static ?string $navigationGroup = 'Пользователи';


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            FileUpload::make('image')
                ->directory('users/images')
                ->avatar()
                ->downloadable()
                ->imageEditor()
                ->label('Изображение'),
            TextInput::make('name')
                ->required()
                ->label('Имя'),
            TextInput::make('email')
                ->email()
                ->required()
                ->label('Email'),
            Select::make('gender')
                ->options([
                    'male' => 'Мужчина',
                    'female' => 'Женщина',
                ])
                ->label('Пол')
                ->required(),
            DatePicker::make('birth')
                ->required()
                ->label('Дата рождения'),
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Имя')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('gender')
                    ->label('Пол')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('birth')
                    ->dateTime()
                    ->label('День рождения')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Создана')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('updated_at')
                    ->label('Обновленно')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('id')
                    ->label('id'),
                Tables\Filters\Filter::make('name')
                    ->label('Имя'),
                Tables\Filters\Filter::make('email')
                    ->label('Email'),
                Tables\Filters\SelectFilter::make('gender')
                    ->options([
                        'male' => 'Мужской',
                        'female' => 'Женский',
                    ])
                ->label('Пол'),

            ])


            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),

            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
