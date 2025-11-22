<?php

namespace App\Filament\Resources\Customers\RelationManagers;

use Filament\Schemas\Schema;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;


class AppointmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'appointments';
    protected static ?string $recordTitleAttribute = 'title';

    // ✅ Correct for v4
    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('service_type')->required(),
            DatePicker::make('appointment_date')->required(),
            TimePicker::make('start_time')->required(),
            TimePicker::make('end_time')->required(),
            TextInput::make('status')->default('scheduled'),
            TextInput::make('notes')->nullable(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('service_type')->sortable()->searchable(),
                TextColumn::make('appointment_date')->date()->sortable(),
                TextColumn::make('start_time')->time(),
                TextColumn::make('end_time')->time(),
                TextColumn::make('status')->badge()
            ])
            ->headerActions([
              createAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}
