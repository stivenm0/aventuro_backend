<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Package;
use App\Models\User;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\LineBreak;
use MoonShine\Metrics\ValueMetric;

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Dashboard';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
		return [
            Grid::make([
               
                    ValueMetric::make('Users')
                        ->value(User::count())
                        ->icon('heroicons.user-group')
                        ->columnSpan(3),

                
                    ValueMetric::make('Packages')
                        ->value(Package::count()) 
                        ->icon('heroicons.bars-4')
                        ->columnSpan(3),

                
                    ValueMetric::make('Offers')
                        ->value(Offer::count())
                        ->icon('heroicons.ticket')
                        ->columnSpan(3),
            
                
                    ValueMetric::make('Bookings')
                        ->value(Booking::count())
                        ->icon('heroicons.banknotes')
                        ->columnSpan(3),

                    ValueMetric::make('Pending Bookings')
                        ->value(Booking::where('status', 'Pending')->count())
                        ->icon('heroicons.hand-raised')
                        ->columnSpan(3),

                    ValueMetric::make('Cancelled Bookings')
                        ->value(Booking::where('status', 'Cancelled')->count())
                        ->icon('heroicons.no-symbol')
                        ->columnSpan(3),

                    ValueMetric::make('Payed Bookings')
                        ->value(Booking::where('status', 'Payed')->count())
                        ->icon('heroicons.banknotes')
                        ->columnSpan(3),

                
                    ValueMetric::make('Categories')
                        ->value(Category::count())
                        ->icon('heroicons.tag')
                        ->columnSpan(3)
                
            ])
                
           
        ];
	}
}
