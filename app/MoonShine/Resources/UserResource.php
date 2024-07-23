<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Request;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Email;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Preview;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Users';

    public string $column = 'name';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable()->showOnExport(),
                Text::make('Name')->showOnExport(),
                Email::make('Email')->showOnExport(),
                Phone::make('Phone')->hideOnIndex()->showOnExport(),
                Text::make('Address')->hideOnIndex()->showOnExport(),
                HasMany::make('Bookings', 'bookings', resource: new BookingResource())
                ->onlyLink(condition: fn()=> $this->isNowOnIndex())
            ]),
        ];
    }

    public function indexFields(): array
    {
        return [

        ];
    }

    public function getActiveActions(): array
    {
        return ['view'];
    }


    public function search(): array
    {
        return ['id', 'name'];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
