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
    function title(){
        return mb_substr( $this->text, 0, 70, 'UTF-8') . '...';
    }

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
            BelongsTo::make('Banner', 'banner', 'App\Nova\Banners')
                ->rules('required')
                ->default(function ($request) {
                    return $request->viaResource === 'banners' ? $request->viaResourceId : null;
                }),
            Image::make('Image','img')
                ->disk(config("filesystems.default"))
                ->path('banner_hotspots')
                ->rules(['max:2048','image'])
                ->help("Support *.png,*.jpg"),
            Text::make('Text', function(){
                return mb_substr( $this->text, 0, 70, 'UTF-8') . '...';
            })->onlyOnIndex(),
            Text::make('Text', 'text')
                ->hideFromIndex()
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
