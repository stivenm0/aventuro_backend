<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Date;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<Booking>
 */
class BookingResource extends ModelResource
{
    protected string $model = Booking::class;

    protected string $title = 'Bookings';

    protected array $with = ['user', 'package'];

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('User', 'user', resource: new UserResource()),
                BelongsTo::make('Package', 'package', resource: new PackageResource()),
                Date::make('Travel Date', 'travel_date')->format('d/m/y')->sortable(),
                Number::make('Quantity'),
                Number::make('Total'),
            ]),
        ];
    }

    public function getActiveActions(): array 
    {
        return ['view', 'update'];
    } 

    public function search(): array
    {
        return ['id', 'user.name'];
        
    }





    /**
     * @param Booking $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
