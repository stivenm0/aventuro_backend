<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Package;
use App\MoonShine\Pages\Example;
use Illuminate\Contracts\Database\Eloquent\Builder;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Preview;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Relationships\HasOne;
use MoonShine\Fields\TinyMce;

/**
 * @extends ModelResource<Package>
 */
class PackageResource extends ModelResource
{
    protected string $model = Package::class;

    protected string $title = 'Packages';

    public string $column = 'title';

    protected array $with = ['category'];

    


    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Grid::make([
                Column::make([
                    ID::make()->sortable()->showOnExport(),
                    BelongsTo::make('Category', 'category', resource: new CategoryResource())
                    ->badge('primary')
                    ->showOnExport(),
                    Image::make('Image')->disk('packages'),
                    Slug::make('Slug')->from('Title')->unique(),
                    Text::make('Destination')->showOnExport(),
                ])->columnSpan(6), 
    
                Column::make([ 
                    Text::make('Title')->showOnExport(),
                    Number::make('Duration')->min(5)->max(31)->buttons()->showOnExport(),
                    Number::make('Price')->showOnExport(),                    
                ])->columnSpan(6)
            ]),
            Block::make([
                TinyMce::make('Description')->showOnExport(),
            ]),
                HasMany::make('Items', 'items', resource: new ItemResource())->creatable()->fields([
                Text::make('Name'),
            ]),
            HasOne::make('Offer', 'offer', resource: new OfferResource())->showOnExport()

        ];
    }


    public function indexFields(): array 
    {
        return [
                ID::make()->sortable(),
                BelongsTo::make('Category', 'category', resource: new CategoryResource())->badge('primary'),
                Text::make('Title'),
                Text::make('Destination'),
                Text::make('Duration', formatted: fn($item)=> $item->duration . ' days'),
                Text::make('Price'),
                Text::make('Items', 'items_count'),
                Preview::make('Offer', 'offer_count')
                ->boolean()
        ];
    }
    

    public function query(): Builder 
    {
        return parent::query()
            ->withCount('items')
            ->withCount(['offer' => function ($query) {
                $query->where('start_date','<', now())
                      ->where('end_date', '>', now());
                    }]);
    } 

    public function redirectAfterSave(): string
    {
        return $this->detailPageUrl($this->item); 
    }

    public function search(): array
    {
        return ['id', 'title'];
    }

    

    /**
     * @param Package $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        if(moonshineRequest()->method() == 'PUT'){
            return [
                'category_id' => 'required|integer|exists:categories,id',
                'title' => 'required|string|max:50',
                'slug' => 'required|string|max:255|unique:packages,slug,'.$item->id,
                'description' => 'required|string|max:1000',
                'destination' => 'required|string|max:255',
                'duration' => 'required|integer|max:255',
                'price' => 'required',
                'image' => 'nullable|mimes:jpg,svg,png'
            ];
        }

        return [
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:50',
            'slug' => 'required|string|max:255|unique:packages,slug',
            'description' => 'required|string|max:1000',
            'destination' => 'required|string|max:255',
            'duration' => 'required|integer|max:255',
            'price' => 'required|integer',
            'image' => 'required|mimes:jpg,svg,png'
        ];
    }

}
