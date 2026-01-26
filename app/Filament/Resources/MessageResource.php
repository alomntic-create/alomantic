<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Filament\Resources\MessageResource\RelationManagers;
use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'آراء العملاء';
    protected static ?string $pluralLabel = 'آراء العملاء';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    , // المستخدم يدخلها من الواجهة فقط

                Forms\Components\TextInput::make('sender')
                    ,

                Forms\Components\Textarea::make('content')
                 ,

                Forms\Components\Toggle::make('approved')
                    ->label('موافقة؟'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sender')->label('المرسل'),
                Tables\Columns\TextColumn::make('email')->label('الإيميل'),
                Tables\Columns\TextColumn::make('content')->label('المحتوى')->limit(50),

                // ✅ عمود للتبديل المباشر من الاندكس
                Tables\Columns\ToggleColumn::make('approved')
                    ->label('موافقة'),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(), // حذف فقط
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('approved')->label('الحالة'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // لتغيير حالة الموافقة
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
            'index' => Pages\ListMessages::route('/'),
            'create' => Pages\CreateMessage::route('/create'),
            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }
}
