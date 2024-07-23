<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Category>
 */
class CategoryResource extends ModelResource
{
    protected string $model = Category::class;

    protected string $title = 'Categories';

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    public string $column = 'name'; 

    protected bool $withPolicy = true;


    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
            return [
            Block::make([
                ID::make()->sortable()->showOnExport(),
                Text::make('Name')->showOnExport(),
                Text::make('Description')->showOnExport(),
            ]),
        ];
    }

    public function redirectAfterSave(): string
    {
        return $this->url();
    }

    public function search(): array 
    {
        return ['id', 'name'];
    } 


    public function getActiveActions(): array 
    {
        return ['create', 'update', 'delete', 'massDelete'];
    } 

    /**
     * @param Category $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:250'
        ];
    }
}
