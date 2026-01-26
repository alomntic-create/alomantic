<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfoResource\Pages;
use App\Filament\Resources\InfoResource\RelationManagers;
use App\Models\Info;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InfoResource extends Resource
{
    protected static ?string $model = Info::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'بيانات الصفحة ';
    protected static ?string $pluralLabel = 'بيانات الصفحة الرئيسية ';
    protected static ?string $modelLabel = 'بيانات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->label('النوع')
                    ->options([
                        1 => 'راس الصفحة ',
                        2 => 'من نحن',
                        3 => 'اين نحن ',
                        4 => ' وصف الشركة في التذييل ',
                        5 => ' رقم الهاتف ',
                        6 => ' ايميل ',
                        7 => ' واتساب ',
                        8 => ' انستجرام  ',
                        9 => ' رقم الطلبات في واتساب ',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('title')
                    ->label('العنوان')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('subtitle')
                    ->label('العنوان الفرعي')
                    ->required(),

                Forms\Components\RichEditor::make('content')
                    ->label('المحتوى')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'bulletList',
                        'numberList',
                        'link',
                        'blockquote',
                        'codeBlock',
                        'undo',
                        'redo',
                    ]),
                FileUpload::make('media_file')
                    ->label('صورة العرض  ')
                    ->directory('uploads/products')
                    ->preserveFilenames(),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('type')->label('النوع')->sortable(),
                Tables\Columns\TextColumn::make('title')->label('العنوان')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('subtitle')->label('العنوان الفرعي')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->label('تاريخ الإنشاء')->dateTime(),

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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInfos::route('/'),
            'create' => Pages\CreateInfo::route('/create'),
            'edit' => Pages\EditInfo::route('/{record}/edit'),
        ];
    }
}
