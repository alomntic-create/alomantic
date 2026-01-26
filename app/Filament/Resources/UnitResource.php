<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnitResource\Pages;
use App\Filament\Resources\UnitResource\RelationManagers;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitResource extends Resource
{
    protected static ?string $model = Unit::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'الوحدات';
    protected static ?string $pluralModelLabel = 'الوحدات';
    protected static ?string $modelLabel = 'وحدة';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('اسم الوحدة')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('abbreviation')
                    ->label('الاختصار')
                    ->required()
                    ->maxLength(50),

                Forms\Components\Toggle::make('is_base')
                    ->label('هل وحدة أساسية؟')
                    ->default(false),

                Forms\Components\Toggle::make('is_measurable')
                    ->label('قابلة للقياس؟')
                    ->default(true),

                Forms\Components\Select::make('measurement_type_id')
                    ->label('نوع القياس')
                    ->relationship('measurementType', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('اسم الوحدة')->sortable(),
                Tables\Columns\TextColumn::make('abbreviation')->label('الاختصار'),
                Tables\Columns\IconColumn::make('is_base')->label('أساسية')->boolean(),
                Tables\Columns\IconColumn::make('is_measurable')->label('قابلة للقياس')->boolean(),
                Tables\Columns\TextColumn::make('measurementType.name')->label('نوع القياس'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListUnits::route('/'),
            'create' => Pages\CreateUnit::route('/create'),
            'edit' => Pages\EditUnit::route('/{record}/edit'),
        ];
    }
}
