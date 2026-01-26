<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MeasurementTypeResource\Pages;
use App\Filament\Resources\MeasurementTypeResource\RelationManagers;
use App\Models\MeasurementType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MeasurementTypeResource extends Resource
{
    protected static ?string $model = MeasurementType::class;

    protected static ?string $navigationIcon = 'heroicon-o-scale';
    protected static ?string $navigationLabel = 'طرق القياس';
    protected static ?string $pluralModelLabel = 'طرق القياس';
    protected static ?string $modelLabel = 'طريقة قياس';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('اسم نوع القياس')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('abbreviation')
                    ->label('الاختصار')
                    ->required()
                    ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
            Tables\Columns\TextColumn::make('name')->label('اسم نوع القياس')->sortable(),
            Tables\Columns\TextColumn::make('abbreviation')->label('الاختصار'),
            Tables\Columns\TextColumn::make('created_at')->label('تاريخ الإنشاء')->dateTime()->sortable(),
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
            'index' => Pages\ListMeasurementTypes::route('/'),
            'create' => Pages\CreateMeasurementType::route('/create'),
            'edit' => Pages\EditMeasurementType::route('/{record}/edit'),
        ];
    }
}
