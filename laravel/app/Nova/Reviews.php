<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

use Webard\NovaSunEditor\SunEditor;

class Reviews extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Reviews>
     */
    public static $model = \App\Models\Reviews::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
        'position',
        'content'
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
            Image::make('Avartar', 'avartar')
                ->disk('public')
                ->path('reviews')
                ->rules('nullable', 'image', 'max:2048'),
            Text::make('Name', 'name')
                ->rules('required', 'max:255'),
            Text::make('Position', 'position')
                ->hideFromIndex()
                ->rules('nullable', 'max:255'),
            Select::make('Rating', 'rating')
                ->options([
                    1 => '1 Star',
                    2 => '2 Stars',
                    3 => '3 Stars',
                    4 => '4 Stars',
                    5 => '5 Stars',
                ])
                ->rules('required', 'integer', 'min:1', 'max:5')
                ->displayUsingLabels(),
            SunEditor::make('Content', 'content')
                ->rules(['required'])
                ->hideFromIndex(),
            Date::make('Post Date', 'post_date')
                ->rules(['required'])
                ->hideFromIndex()
                ->withMeta(['value' => $this->start_date ?? now()]),
            Text::make('Period', function(){
                return $this->display_period;
            }),
            Date::make('Display At', 'start')
                ->withMeta(['value' => $this->start_date ?? now()])
                ->rules(['required'])
                ->hideFromIndex(),
            Date::make('Display End', 'end')
                ->hideFromIndex(),
            Boolean::make('Publish?', 'is_publish')
                ->default(1),
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
