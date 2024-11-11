<?php

namespace App\Filament\Resources;

use App\Containers\AppSection\Post\Models\Post;
use App\Containers\AppSection\User\Models\User;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;


class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected  static  ?string $navigationLabel = 'Посты';
    protected  static  ?string $modelLabel = 'Посты';

    protected static ?string $navigationGroup = 'Посты';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('title')
                ->required()
                ->label('Название'),
            TextInput::make('content')
                ->required()
                ->label('Текст'),
            SpatieMediaLibraryFileUpload::make('image')
                ->collection('image')
                ->directory('posts/images')
                ->avatar()
                ->downloadable()
                ->imageEditor()
                ->label('Изображение'),
            Select::make('user_id')
                ->label('Пользователь')
                ->options(User::whereNotNull('name')->pluck('name', 'id')->toArray())
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        {
            return $table
                ->columns([
                    TextColumn::make('id')
                        ->label('ID')
                        ->sortable()
                        ->searchable(),
                    SpatieMediaLibraryImageColumn::make('image')
                        ->collection('image')
                        ->label('Картинка')
                        ->circular(),
                    TextColumn::make('title')
                        ->label('Название'),
                    TextColumn::make('user.name')
                        ->label('Пользователь'),
                    
                ])
                ->filters([
                    //
                ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make(),
                    ]),
                ]);
        }
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
