<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Offer;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\DateRange;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Pages\Crud\DetailPage;

/**
 * @extends ModelResource<Offer>
 */
class OfferResource extends ModelResource
{
    protected string $model = Offer::class;

    protected string $title = 'Offers';

    protected array $with = ['package'];

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable()->showOnExport(),
                BelongsTo::make('Package', 'package', resource: new PackageResource())->searchable()->showOnExport(),
                Number::make('Discount', formatted: fn($item)=> $item->discount . ' %')->min(5)->max(100)->showOnExport(),
                DateRange::make('Date')
                ->fromTo('start_date','end_date')
                ->format('d/m/Y')->showOnExport()
            ]),
        ];
    }

    public function getActiveActions(): array
    {
        return ['create', 'update', 'delete', 'massDelete'];
    }

    /**
     * @param Offer $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        // dd(moonshineRequest());
        return [
            'package_id' => 'required|integer|exists:packages,id',
            'discount' => 'required|numeric|min:5|max:100',
            'date.start_date' => 'required|date',
            'date.end_date' => 'required|date|after_or_equal:date.start_date',
        ];
    }
}
