<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Item>
 */
class ItemResource extends ModelResource
{
    protected string $model = Item::class;

    protected string $title = 'Items';
 

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                BelongsTo::make('Package', 'package', resource: new PackageResource()),
                Text::make('Name')
            ]),
        ];
    }

    public function getActiveActions(): array
    {
        return ['create','update', 'delete','massDelete' ];
    }

    public function search(): array
    {
        return [];
    }


    /**
     * @param Item $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => 'required|max:200'
        ];
    }
}
