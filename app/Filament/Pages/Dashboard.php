<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\TemptChart;
use App\Filament\Widgets\Charts;
use App\Filament\Widgets\BlogPostsChart;
use App\Filament\Widgets\TemptStats;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class Dashboard extends BaseDashboard{


    public function getWidgets(): array
      {
          return [
            TemptStats::class,
            BlogPostsChart::class,
            TemptChart::class,
          ];
      }

}