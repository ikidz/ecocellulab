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

use Ardenthq\ImageGalleryField\ImageGalleryField;
use Webard\NovaSunEditor\SunEditor;

class Researches extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Researches>
     */
    public static $model = \App\Models\Researches::class;

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
        'description',
        'content',
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
            Image::make('Thumbnail', 'thumb')
                ->disk('public')
                ->path('researches')
                ->rules(['image', 'max:2048'])
                ->help("Support *.png,*.jpg. File size should not exceed 2MB.")
                ->indexWidth(150),
            Image::make('Image', 'img')
                ->disk('public')
                ->path('researches')
                ->rules(['image', 'max:2048'])
                ->help("Support *.png,*.jpg. File size should not exceed 2MB.")
                ->hideFromIndex(),
            Text::make('Title', 'title')
                ->rules(['required', 'max:140']),
            Textarea::make('Description', 'description')
                ->rules(['required', 'max:500']),
            SunEditor::make('Content', 'content')
                ->withFiles('public','researches/attachments')
                ->settings([
                    'imageUploadUrl'   => route('custom-suneditor.upload', [
                        'resource' => static::uriKey(), // "banners"
                        'field'    => 'subtitle',
                    ]),
                    'imageUploadParam' => 'file', // 👈 force the key name
                    'imageUploadHeader' => [
                        'X-Requested-With' => 'XMLHttpRequest',
                        'X-CSRF-TOKEN'     => csrf_token(),
                    ],
                ])
                ->rules(['required'])
                ->hideFromIndex(),
            Text::make('Post Date', function(){
                return $this->display_post_date;
            }),
            Date::make('Post Date', 'post_date')
                ->withMeta(['value' => $this->start_date ?? now()])
                ->rules(['required', 'date'])
                ->sortable()
                ->onlyOnForms(),
            Text::make('Period', function(){
                return $this->period;
            }),
            Date::make('Start', 'start')
                ->withMeta(['value' => $this->start_date ?? now()])
                ->rules(['required', 'date'])
                ->onlyOnForms(),
            Date::make('End', 'end')
                ->rules(['nullable', 'date'])
                ->onlyOnForms(),
            Boolean::make('Is Highlight', 'is_highlight')
                ->default(0),
            Boolean::make('Is Published', 'is_publish')
                ->default(1),
            new Panel('SEO', $this->seoFields()),
            new Panel('Galleries', $this->mediaFields()),
        ];
    }

    public function seoFields()
    {
        return [
            Slug::make('Slug')
                ->rules(['required', 'max:255'])
                ->creationRules('unique:researches,slug')
                ->updateRules('unique:researches,slug,{{resourceId}}')
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
                ->path('researches/meta')
                ->rules(['image', 'max:2048'])
                ->help("Support *.png,*.jpg. File size should not exceed 2MB.")
                ->hideFromIndex()
        ];
    }

    public function mediaFields()
    {
        return [
            ImageGalleryField::make('Images','research_galleries')
                ->disk('public_research_galleries')
                ->rules('mimes:jpeg,png,jpg,gif', 'dimensions:min_width=150,min_height=150', 'max:5000')
                ->rulesMessages([
                    'mimes'      => 'You must use a valid jpeg, png, jpg or gif image.',
                    'max'        => 'The image must be less than 5MB.',
                    'dimensions' => 'The image must be at least 150px wide and 150px tall.',
                ])
                ->help('Min size 150 x 150. Max filesize 5MB.')
                // Optional: add this method if you want to show the first image
                // of the gallery on the index page
                ->showOnIndex()
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
