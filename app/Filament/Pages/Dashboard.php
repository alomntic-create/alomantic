<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{


    protected static string $view = 'filament.pages.dashboard';
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'لوحة التحكم';
    protected static ?string $navigationGroup = null;
    function getTitle(): string
    {
        return '   لوحة التحكم';
    }
}
