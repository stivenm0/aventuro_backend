<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Booking;
use App\MoonShine\Controllers\ExamController;
use App\MoonShine\Pages\exam;
use App\MoonShine\Resources\BookingResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\ItemResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\OfferResource;
use App\MoonShine\Resources\PackageResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;
use Illuminate\Http\Request;
use MoonShine\Resources\ModelResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [
            new ItemResource()
        ];
    }

    public function boot(): void
    {
        parent::boot();
 
        // ModelResource::defaultExportToExcel(); 
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ])->icon('heroicons.adjustments-vertical')
            ->canSee(function(Request $request) {
                return $request->user('moonshine')?->id === 1;
            }) ,

            MenuItem::make('Users', new UserResource())
            ->icon('heroicons.outline.user-group'),

            MenuGroup::make('Travels', [
                MenuItem::make('Categories', new CategoryResource())
                ->icon('heroicons.outline.tag')
                ->canSee(function(Request $request) {
                    return $request->user('moonshine')?->id != 3;
                }) 
                ,

                MenuItem::make('Packages', new PackageResource())
                ->icon('heroicons.outline.bars-4'),

                MenuItem::make('Offers', new OfferResource())
                ->icon('heroicons.outline.ticket'),

                MenuItem::make('Bookings', new BookingResource())
                ->icon('heroicons.outline.banknotes')
                ->badge(fn()=>Booking::where('status', 'Pending')->count()),

            ])->icon('heroicons.outline.paper-airplane'),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [
            'colors' => [
                'primary' => '#004080',
                'secondary' => '#FFA500'
            ], 
        ];
    }
}
