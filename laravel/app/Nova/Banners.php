<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Validation\Rule;

use Outl1ne\NovaSortable\Traits\HasSortableRows;
use Alexwenzel\DependencyContainer\HasDependencies;
use Alexwenzel\DependencyContainer\DependencyContainer;
use Mostafaznv\NovaVideo\Video;
use Webard\NovaSunEditor\SunEditor;

class Banners extends Resource
{
    use HasSortableRows, HasDependencies;
    public static $group = 'BANNERS';
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Banner>
     */
    public static $model = \App\Models\Banners::class;

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
            Text::make('Type', function(){
                switch( $this->type ){
                    case 'image' : return 'Image'; break;
                    case 'video' : return 'Video'; break;
                    case 'youtube' : return 'YouTube'; break;
                    default : return 'N/A';
                }
            }),
            Text::make('Preview', function(){
                switch( $this->type ){
                    case 'image' :
                        return '<p><img src="'.$this->display_media.'" alt="" style="width:260px;" /></p>';
                    break;
                    case 'video' :
                        return '<p><video width="320" height="240" controls><source src="'.$this->display_media.'" type="video/mp4">Your browser does not support the video tag.</video></p>';
                    break;
                    case 'youtube' :
                        return '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$this->youtube_id.'" allowfullscreen></iframe></div>';
                    break;
                    default : return null;
                }
            })->asHtml(),
            Text::make(__('URL'), 'url')
                ->hideFromIndex(),
            Text::make(__('Name'), 'name')
                ->rules('required'),
            Text::make(__('Title'), 'title')
                ->rules('required')
                ->hideFromIndex(),
            SunEditor::make('Subtitle', 'subtitle')
                ->rules(['required'])
                ->hideFromIndex(),
            Text::make('Hotspot YouTube ID', function(){
                if( $this->hotspot_youtube_id != '' || $this->hotspot_youtube_id != null ){
                    return '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$this->hotspot_youtube_id.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                }
                return 'N/A';
            })->hideFromIndex()
            ->asHtml(),
            Text::make(__('Period'), function(){
                return $this->period;
            })->exceptOnForms(),
            Boolean::make(__('Publish?'), 'is_publish')
                ->default(1),
            HasMany::make('Hotspots', 'hotspots', 'App\Nova\BannerHotspots')
                
        ];
    }

    public function fieldsForCreate( NovaRequest $request ){
        $researches = \App\Models\Researches::Published()->get()->pluck('title','id')->toArray();
        $products = \App\Models\Products::Published()->get()->pluck('title','id')->toArray();
        return [
            Select::make('Type', 'type')
                ->options([
                    'image' => 'Image',
                    'video' => 'Video (File)',
                    // 'youtube' => 'Video (YouTube)'
                ])
                ->default('image'),
            DependencyContainer::make([
                Image::make('Image (For desktop)','img')
                    ->disk(config("filesystems.default"))
                    ->path('banners')
                    ->rules(['max:2048','image'])
                    ->help("Support *.png,*.jpg")
                    ->onlyOnForms(),
            ])->dependsOn('type', 'image'),
            DependencyContainer::make([
                Video::make('Video (File)', 'video', 'public_vdo_media')
                    ->rules('file', 'max:15360', 'mimes:mp4', 'mimetypes:video/mp4')
                    ->creationRules('required')
                    ->updateRules('nullable')
                    ->help('Support .mp4 only with size must not exceed more than 15Mb.'),
            ])->dependsOn('type', 'video'),
            DependencyContainer::make([
                Text::make('Video (YouTube)', 'youtube_id')
                    ->creationRules('required')
                    ->updateRules('nullable')
                    ->placeholder('https://www.youtube.com/watch?v=VIDEO_ID'),
            ])->dependsOn('type', 'youtube'),
            Select::make('Link to', 'link_type')
                ->options([
                    'none' => 'None',
                    'research' => 'Research page',
                    'product' => 'Product page',
                    'external' => 'External',
                ])
                ->default('none')
                ->rules(['required']),
            DependencyContainer::make([
                Text::make('URL', 'url')
                    ->hideFromIndex(),
            ])->dependsOn('link_type', 'external'),
            DependencyContainer::make([
                Select::make('Research', 'content_id')
                    ->options($researches)
                    ->searchable()
                    ->displayUsingLabels()
                    ->hideFromIndex()
                    ->rules(function () {
                        return [
                            Rule::requiredIf(function () {
                                return request()->input('link_type') === 'research';
                            }),
                        ];
                    }),
            ])->dependsOn('link_type', 'research'),
            DependencyContainer::make([
                Select::make('Product', 'content_id')
                    ->options($products)
                    ->searchable()
                    ->displayUsingLabels()
                    ->hideFromIndex()
                    ->rules(function () {
                        return [
                            Rule::requiredIf(function () {
                                return request()->input('link_type') === 'product';
                            }),
                        ];
                    }),
            ])->dependsOn('link_type', 'product'),
            Text::make('Name', 'name')
                ->rules('required'),
            Image::make('Image above title','title_img')
                ->disk(config("filesystems.default"))
                ->path('banners')
                ->rules(['max:2048', 'dimensions:max_width=500,max_height=500','image'])
                ->help("Support *.png,*.jpg, max 500x500px")
                ->onlyOnForms(),
            Text::make('Title', 'title')
                ->rules('required'),
            SunEditor::make('Subtitle', 'subtitle')
                ->withFiles('public','banners/attachments')
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
            Text::make('Hotspot YouTube ID', 'hotspot_youtube_id')
                ->rules('nullable')
                ->help('This is used for hotspot video on the banner.'),
            Date::make('Start at', 'start')
                ->withMeta(['value' => $this->start_date ?? now()])
                ->rules('required')
                ->onlyOnForms(),
            Date::make('End at', 'end')
                ->onlyOnForms(),
            Boolean::make('Publish?', 'is_publish')
                ->default(1)
        ];
    }

    public function fieldsForUpdate( NovaRequest $request ){
        $researches = \App\Models\Researches::Published()->get()->pluck('title','id')->toArray();
        $products = \App\Models\Products::Published()->get()->pluck('title','id')->toArray();
        return [
            Select::make('Type', 'type')
                ->options([
                    'image' => 'Image',
                    'video' => 'Video (File)',
                    // 'youtube' => 'Video (YouTube)'
                ])
                ->default('image'),
            DependencyContainer::make([
                Image::make('Image (For desktop)','img')
                    ->disk(config("filesystems.default"))
                    ->path('banners')
                    ->rules(['max:2048','image'])
                    ->help("Support *.png,*.jpg")
                    ->onlyOnForms(),
            ])->dependsOn('type', 'image'),
            DependencyContainer::make([
                Video::make('Video (File)', 'video', 'public_vdo_media')
                    ->rules('file', 'max:15360', 'mimes:mp4', 'mimetypes:video/mp4')
                    ->creationRules('required')
                    ->updateRules('nullable')
                    ->help('Support .mp4 only with size must not exceed more than 15Mb.'),
            ])->dependsOn('type', 'video'),
            DependencyContainer::make([
                Text::make('Video (YouTube)', 'youtube_id')
                    ->creationRules('required')
                    ->updateRules('nullable')
                    ->placeholder('https://www.youtube.com/watch?v=VIDEO_ID'),
            ])->dependsOn('type', 'youtube'),
            Select::make('Link to', 'link_type')
                ->options([
                    'none' => 'None',
                    'research' => 'Research page',
                    'product' => 'Product page',
                    'external' => 'External',
                ])
                ->default('none')
                ->rules(['required']),
            DependencyContainer::make([
                Text::make('URL', 'url')
                    ->hideFromIndex(),
            ])->dependsOn('link_type', 'external'),
            DependencyContainer::make([
                Select::make('Research', 'content_id')
                    ->options($researches)
                    ->searchable()
                    ->displayUsingLabels()
                    ->hideFromIndex()
                    ->rules(function () {
                        return [
                            Rule::requiredIf(function () {
                                return request()->input('link_type') === 'research';
                            }),
                        ];
                    }),
            ])->dependsOn('link_type', 'research'),
            DependencyContainer::make([
                Select::make('Product', 'content_id')
                    ->options($products)
                    ->searchable()
                    ->displayUsingLabels()
                    ->hideFromIndex()
                    ->rules(function () {
                        return [
                            Rule::requiredIf(function () {
                                return request()->input('link_type') === 'research';
                            }),
                        ];
                    }),
            ])->dependsOn('link_type', 'product'),
            Text::make('Name', 'name')
                ->rules('required'),
            Image::make('Image above title','title_img')
                ->disk(config("filesystems.default"))
                ->path('banners')
                ->rules(['max:2048', 'dimensions:max_width=500,max_height=500','image'])
                ->help("Support *.png,*.jpg, max 500x500px")
                ->onlyOnForms(),
            Text::make('Title', 'title')
                ->rules('required'),
            SunEditor::make('Subtitle', 'subtitle')
                ->withFiles('public','banners/attachments')
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
            Text::make('Hotspot YouTube ID', 'hotspot_youtube_id')
                ->rules('nullable')
                ->help('This is used for hotspot video on the banner.'),
            Date::make('Start at', 'start')
                ->withMeta(['value' => $this->start_date ?? now()])
                ->rules('required')
                ->onlyOnForms(),
            Date::make('End at', 'end')
                ->onlyOnForms(),
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
