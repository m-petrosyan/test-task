<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;
use App\Models\Activity;
use App\Traits\AccessPanelActions;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ActivityResource extends Resource
{
    use AccessPanelActions;

    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('participants')
                    ->relationship('participant', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->placeholder('Select Participant'),
                Select::make('activity_type_id')
                    ->label('Activity Type')
                    ->required()
                    ->relationship('activityType', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Select Activity Type'),
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Repeater::make('activity_dates')
                    ->label('Date Time Schedule')
                    ->schema([
                        DateTimePicker::make('start')
                            ->required()
                            ->label('Start Date'),

                        DateTimePicker::make('end')
                            ->required()
                            ->label('End Date'),
                    ])
                    ->default([])
                    ->minItems(1)
                    ->maxItems(1)
                    ->required(),
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
                Textarea::make('description')
                    ->maxLength(2000),
                Textarea::make('short_description')
                    ->maxLength(500),
                SpatieMediaLibraryFileUpload::make('images')
                    ->acceptedFileTypes(['image/*', 'video/*'])
                    ->required()
                    ->multiple()
                    ->directory('media_files')
                    ->collection('media_files'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query) {
                $query->with('activityType');
            })
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable()
                    ->label('ID'),
                TextColumn::make('activityType.name')
                    ->badge()
                    ->sortable()
                    ->searchable()
                    ->label('ID'),
                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->label('Name'),
                TextColumn::make('activity_dates')
                    ->label('Schedule')
                    ->formatStateUsing(function ($state, $record) {
                        $dates = $record->activity_dates;

                        if (!is_array($dates) || empty($dates)) {
                            return '-';
                        }

                        return collect($dates)->map(function ($date) {
                            $start = !empty($date['start']) ? \Carbon\Carbon::parse($date['start'])->format('Y-m-d H:i') : '?';
                            $end = !empty($date['end']) ? \Carbon\Carbon::parse($date['end'])->format('Y-m-d H:i') : '?';
                            return "$start – $end";
                        })->implode('<br>');
                    })
                    ->html(),
                TextColumn::make('location')
                    ->label('Coordinates')
                    ->formatStateUsing(function ($state, $record) {
                        $locations = $record->location;

                        if (!is_array($locations) || empty($locations)) {
                            return '-';
                        }

                        return collect($locations)->map(function ($loc) {
                            $lat = $loc['latitude'] ?? '?';
                            $lng = $loc['longitude'] ?? '?';
                            return "Lat: $lat, Lng: $lng";
                        })->implode('<br>');
                    })
                    ->html(),
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
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
