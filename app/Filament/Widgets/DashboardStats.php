<?php

namespace App\Filament\Widgets;

use App\Models\Addon;
use App\Models\Category;
use App\Models\DownloadLog;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalAddons = Addon::count();
        $publishedAddons = Addon::where('status', 'published')->count();
        $draftAddons = Addon::where('status', 'draft')->count();
        $totalDownloads = DownloadLog::count();
        $totalCategories = Category::count();

        return [
            Stat::make('Total Addons', $totalAddons)
                ->description($publishedAddons.' published, '.$draftAddons.' draft')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary'),

            Stat::make('Published Addons', $publishedAddons)
                ->description('Addon yang tampil di website publik')
                ->descriptionIcon('heroicon-m-eye')
                ->color('success'),

            Stat::make('Total Downloads', $totalDownloads)
                ->description('Total klik download dari website/bot')
                ->descriptionIcon('heroicon-m-arrow-down-tray')
                ->color('info'),

            Stat::make('Kategori', $totalCategories)
                ->description('Kategori addon yang tersedia')
                ->descriptionIcon('heroicon-m-folder')
                ->color('warning'),
        ];
    }
}
