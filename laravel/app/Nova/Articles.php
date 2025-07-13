<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Panel;
use Laravel\Nova\Http\Requests\NovaRequest;

use Webard\NovaSunEditor\SunEditor;

class Articles extends Resource
{
    public static $group = 'ARTICLES';
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Articles>
     */
    public static $model = \App\Models\Articles::class;

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
        'caption',
        'description',
        'slug',
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
            Image::make('Thumbnail', 'thumb')
                ->path('articles')
                ->rules(['max:2048', 'image'])
                ->help('Support *.png, *.jpg. Maximum size is 2 Mb.')
                ->indexWidth(260),
            Image::make('Image', 'img')
                ->path('articles')
                ->rules(['max:2048', 'image'])
                ->help('Support *.png, *.jpg. Maximum size is 2 Mb.')
                ->hideFromIndex(),
            Text::make('Title', 'title')
                ->rules(['required']),
            Textarea::make('Caption', 'caption')
                ->hideFromIndex(),
            SunEditor::make('Content', 'description')
                ->rules(['required'])
                ->hideFromIndex(),
            Text::make('Post Date', function(){
                return $this->display_post_date;
            }),
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
            new Panel('SEO', $this->seoFields()),
        ];
    }

    public function seoFields()
    {
        return [
            Slug::make('Slug', 'slug')
                ->rules(['required', 'max:255'])
                ->creationRules('unique:articles,slug')
                ->updateRules('unique:articles,slug,{{resourceId}}')
                ->from('Title')
                ->separator('_')
                ->help('The slug is automatically generated from the title.')
                ->hideFromIndex(),
            Text::make('Meta Title', 'meta_title')
                ->rules(['nullable', 'max:255'])
                ->hideFromIndex(),
            Textarea::make('Meta Description', 'meta_description')
                ->rules(['nullable', 'max:500'])
                ->hideFromIndex(),
            Text::make('Meta Keywords', 'meta_keywords')
                ->rules(['nullable', 'max:255'])
                ->hideFromIndex(),
            Image::make('Meta Image', 'meta_image')
                ->disk('public')
                ->path('articles/meta')
                ->rules(['image', 'max:2048'])
                ->help("Support *.png,*.jpg. File size should not exceed 2MB.")
                ->hideFromIndex()
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
