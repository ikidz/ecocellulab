<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Panel;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;

use Outl1ne\NovaSortable\Traits\HasSortableRows;

class ProductCategories extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ProductCategories>
     */
    public static $model = \App\Models\ProductCategories::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords'
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
            Text::make('Title', 'title')
                ->rules('required', 'max:255'),
            Boolean::make('Is Published', 'is_publish')
                ->default(1),
            new Panel('SEO', $this->seoFields()),
            HasMany::make('Products', 'products', 'App\Nova\Products'),
        ];
    }

    public function seoFields()
    {
        return [
            Slug::make('Slug', 'slug')
                ->from('title')
                ->rules('required', 'max:255'),
            Text::make('Meta Title', 'meta_title')
                ->rules('max:255'),
            Textarea::make('Meta Description', 'meta_description')
                ->rules('max:500'),
            Text::make('Meta Keywords', 'meta_keywords')
                ->rules('max:255'),
            Image::make('Meta Image', 'meta_image')
                ->disk('public')
                ->path('product_categories/meta')
                ->rules('nullable', 'image', 'max:2048'),
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
