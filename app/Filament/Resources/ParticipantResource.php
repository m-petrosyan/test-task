<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParticipantResource\Pages;
use App\Filament\Resources\ParticipantResource\RelationManagers;
use App\Models\Participant;
use App\Traits\AccessPanelActions;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ParticipantResource extends Resource
{
    use AccessPanelActions;

    protected static ?string $model = Participant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('activities')
                    ->relationship('activities', 'title')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->placeholder('Select Activities'),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Name'),
                TextInput::make('url')
                    ->url()
                    ->nullable()
                    ->maxLength(255)
                    ->label('URL'),
                Repeater::make('location')
                    ->label('Location coordinates')
                    ->schema([
                        TextInput::make('latitude')
                            ->required()
                            ->rule('regex:/^-?(?:90(?:\.0{1,6})?|(?:[0-8]?[0-9])(?:\.[0-9]{1,6})?)$/'),
                        TextInput::make('longitude')
                            ->required()
                            ->rule('regex:/^-?(?:180(?:\.0{1,6})?|(?:[0-1]?[0-7]?[0-9])(?:\.[0-9]{1,6})?)$/')
                    ])
                    ->default([])
                    ->minItems(1)
                    ->maxItems(1)
                    ->required(),
                SpatieMediaLibraryFileUpload::make('logo')
                    ->acceptedFileTypes(['image/*'])
                    ->required()
                    ->directory('media_files')
                    ->collection('logo'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('url')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListParticipants::route('/'),
            'create' => Pages\CreateParticipant::route('/create'),
            'edit' => Pages\EditParticipant::route('/{record}/edit'),
        ];
    }
}
