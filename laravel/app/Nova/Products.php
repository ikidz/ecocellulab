<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Panel;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Http\Requests\NovaRequest;

use Ardenthq\ImageGalleryField\ImageGalleryField;
use Webard\NovaSunEditor\SunEditor;
use Spatie\TagsField\Tags;

class Products extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Products>
     */
    public static $model = \App\Models\Products::class;

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
        'product_categories.title',
        'title',
        'sku',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'short_description',
        'description',
        'tags'
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
            BelongsTo::make('Category', 'category', 'App\Nova\ProductCategories')
                ->rules('required'),
            Image::make('Image', 'img')
                ->disk('public')
                ->path('products')
                ->rules('required', 'image', 'max:2048'),
            Text::make('Title', 'title')
                ->rules('required', 'max:255'),
            Text::make('SKU', 'sku')
                ->rules('required', 'max:100'),
            Select::make('Rating', 'rating')
                ->options([
                    0 => 'No Rating',
                    1 => '1 Star',
                    2 => '2 Stars',
                    3 => '3 Stars',
                    4 => '4 Stars',
                    5 => '5 Stars',
                ])
                ->default(0)
                ->rules('required', 'integer')
                ->displayUsingLabels(),
            Number::make('Price', 'price')
                ->rules('required', 'numeric')
                ->min(0.00)
                ->max(999999.99)
                ->step(1.00),
            Textarea::make('Short Description', 'short_description'),
            SunEditor::make('Description', 'description')
                ->rules('required'),
            Tags::make('Tags'),
            Boolean::make('Is Published', 'is_publish')
                ->default(1),
            new Panel('Galleries', $this->mediaFields()),
            new Panel('SEO', $this->seoFields()),
            HasMany::make('Product Reviews', 'product_reviews', 'App\Nova\ProductReviews'),
        ];
    }

    public function mediaFields()
    {
        return [
            ImageGalleryField::make('Images','product_galleries')
                ->disk('public_product_galleries')
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
                ->path('products/meta')
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
