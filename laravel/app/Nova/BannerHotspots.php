<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

use Outl1ne\NovaSortable\Traits\HasSortableRows;

class BannerHotspots extends Resource
{
    use HasSortableRows;
    public static $displayInNavigation = false;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\BannerHotspots>
     */
    public static $model = \App\Models\BannerHotspots::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'text';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'text',
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
            BelongsTo::make('Banner', 'banner', 'App\Nova\Banner')
                ->rules('required')
                ->searchable(),
            Image::make('Image','img')
                ->disk(config("filesystems.default"))
                ->path('banner_hotspots')
                ->rules(['max:2048','image'])
                ->help("Support *.png,*.jpg")
                ->onlyOnForms(),
            Text::make('Text', 'text')
                ->rules('required'),
            Boolean::make('Publish?', 'is_publish')
                ->default(1)
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
