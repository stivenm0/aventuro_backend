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
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Booking>
 */
class BookingResource extends ModelResource
{
    protected string $model = Booking::class;

    protected string $title = 'Bookings';

    protected array $with = ['user', 'package'];

    protected bool $editInModal = true; 

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable()->showOnExport(),
                BelongsTo::make('User', 'user', resource: new UserResource())->showOnExport(),
                BelongsTo::make('Package', 'package', resource: new PackageResource())->showOnExport(),
                Text::make('Status')->badge(function ($value) { 
                    return match($value){
                        'Pending'=> 'yellow',
                        'Payed'=> 'green',
                        'Cancelled'=> 'red'
                    };
                })->showOnExport(),
                Date::make('Travel Date', 'travel_date')->format('d/m/y')->sortable()->showOnExport(),
                Number::make('Quantity')->showOnExport(),
                Number::make('Total')->showOnExport(),
            ]),
        ];
    }

    public function formFields(): array 
    {
        return [
            ID::make(),
            Select::make('Status', 'status')
            ->options([
                'Pending' => 'Pending',
                'Cancelled' => 'Cancelled',
                'Payed' => 'Payed'
            ]) ,
            Date::make('Travel Date', 'travel_date'),
        ];
    } 


    public function redirectAfterSave(): string
    {
        return $this->url();
    }

    public function getActiveActions(): array 
    {
        return ['view', 'update', 'create'];
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
        return [
            'status' => ['required', 'in:Pending,Cancelled,Payed'],
        ];
    }
}
