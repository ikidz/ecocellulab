<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Illuminate\Validation\Rule;

use Alexwenzel\DependencyContainer\HasDependencies;
use Alexwenzel\DependencyContainer\DependencyContainer;
use Ardenthq\ImageGalleryField\ImageGalleryField;
use Webard\NovaSunEditor\SunEditor;

class CoreProductContents extends Resource
{
    use HasDependencies;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\CoreProductContents>
     */
    public static $model = \App\Models\CoreProductContents::class;

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
        'link_to',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        $researches = \App\Models\Researches::published()->get()->pluck('title','id')->toArray();
        $products = \App\Models\Products::published()->get()->pluck('name','id')->toArray();
        return [
            ID::make()->sortable(),
            Text::make('Title', 'title')
                ->rules('required', 'max:255'),
            SunEditor::make('Description', 'description')
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
            Select::make('Link to', 'link_to')
                ->options([
                    'none' => 'None',
                    'research' => 'Research page',
                    'product' => 'Product page',
                    'external' => 'External',
                ])
                ->displayUsingLabels()
                ->default('none')
                ->rules(['required']),
            DependencyContainer::make([
                Text::make('URL', 'url')
                    ->hideFromIndex(),
            ])->dependsOn('link_to', 'external'),
            DependencyContainer::make([
                Select::make('Research', 'content_id')
                    ->options($researches)
                    ->searchable()
                    ->displayUsingLabels()
                    ->hideFromIndex()
                    ->rules(function () {
                        return [
                            Rule::requiredIf(function () {
                                return request()->input('link_to') === 'research';
                            }),
                        ];
                    }),
            ])->dependsOn('link_to', 'research'),
            DependencyContainer::make([
                Select::make('Product', 'content_id')
                    ->options($products)
                    ->searchable()
                    ->displayUsingLabels()
                    ->hideFromIndex()
                    ->rules(function () {
                        return [
                            Rule::requiredIf(function () {
                                return request()->input('link_to') === 'product';
                            }),
                        ];
                    }),
            ])->dependsOn('link_to', 'product'),
            Text::make(__('Period'), function(){
                return $this->period;
            })->exceptOnForms(),
            Date::make('Start at', 'start')
                ->withMeta(['value' => $this->start_date ?? now()])
                ->rules('required')
                ->onlyOnForms(),
            Date::make('End at', 'end')
                ->onlyOnForms(),
            Boolean::make('Publish?', 'is_publish')
                ->default(1),
            new Panel('Galleries', $this->mediaFields()),
        ];
    }

    public function mediaFields()
    {
        return [
            ImageGalleryField::make('Images','core_product_galleries')
                ->disk('public_core_product_galleries')
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
