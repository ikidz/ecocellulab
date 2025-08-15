<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class ProductReviews extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ProductReviews>
     */
    public static $model = \App\Models\ProductReviews::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'products.title',
        'products.category.title',
        'name',
        'email',
        'review'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Product', 'product', 'App\Nova\Products')
                ->rules(['required', 'exists:products,id'])
                ->searchable(),
            Text::make('Name', 'name')
                ->rules(['required', 'string', 'max:255']),
            Text::make('Email', 'email')
                ->rules(['required', 'email', 'max:255']),
            Select::make('Rating', 'rating')
                ->options([
                    0 => 'Not Rated',
                    1 => '1 Star',
                    2 => '2 Stars',
                    3 => '3 Stars',
                    4 => '4 Stars',
                    5 => '5 Stars',
                ])
                ->displayUsingLabels()
                ->rules(['required', 'integer', 'between:0,5']),
            Textarea::make('Review', 'review')
                ->readonly(),
            Boolean::make('Is Approved', 'is_approved')
                ->default(0)
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
