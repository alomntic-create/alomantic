<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'الأصناف';

    protected static ?string $pluralModelLabel = 'الأصناف';
    protected static ?string $modelLabel = 'صنف';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('اسم المنتج')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->label('الوصف')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('detail')
                    ->label('التفاصيل ')
                    ->maxLength(65535),

                Select::make('category_id')
                    ->label('القسم')
                    ->options(Category::pluck('name', 'id'))
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('sku')
                    ->label('رمز المنتج')
                    ->required()
                    ->maxLength(100),

                Forms\Components\TextInput::make('slug')
                    ->label('رابط المنتج')
                    ->maxLength(100),


                Repeater::make('productUnits')
                    ->label('الوحدات')
                    ->relationship() // يستخدم العلاقة مع الـ ProductUnit
                    ->schema([
                        Select::make('unit_id')
                            ->label('الوحدة')
                            ->options(Unit::pluck('name', 'id'))
                            ->searchable()
                            ->required(),

                        Forms\Components\TextInput::make('conversion_factor')
                            ->label('معامل التحويل')
                            ->numeric()
                            ->required(),

                        Forms\Components\TextInput::make('price')
                            ->label('السعر')
                            ->numeric()
                            ->required(),

                    ])
                    ->columns(3)
                    ->createItemButtonLabel('إضافة وحدة جديدة'),

                FileUpload::make('media_profile')
                    ->label('صورة العرض  ')
                    ->directory('uploads/products')
                    ->preserveFilenames(),

                FileUpload::make('media_files')
                    ->label('صور الصنف ')
                    ->multiple()
                    ->directory('uploads/products')
                    ->preserveFilenames(),


                FileUpload::make('media360')
                    ->label('الصورة 360/180')
                    ->disk('public')                // مهم
                    ->directory('uploads/products') // كما في كودك
                    ->preserveFilenames()


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('اسم المنتج')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('price')->label('السعر')->sortable(),
                Tables\Columns\TextColumn::make('slug')->label('رابط المنتج'),
                Tables\Columns\TextColumn::make('created_at')->label('تاريخ الإنشاء')->dateTime()->sortable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
