<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Http\Requests\NovaRequest;

use Outl1ne\NovaSortable\Traits\HasSortableRows;
use Alexwenzel\DependencyContainer\HasDependencies;
use Alexwenzel\DependencyContainer\DependencyContainer;
use Mostafaznv\NovaVideo\Video;

class Banner extends Resource
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
            Text::make(__('Period'), function(){
                return $this->period;
            })->exceptOnForms(),
            Boolean::make(__('Publish?'), 'is_publish')
                ->default(1),
            HasMany::make('Hotspots', 'hotspots', 'App\Nova\BannerHotspots')
                
        ];
    }

    public function fieldsForCreate( NovaRequest $request ){
        return [
            Select::make('Type', 'type')
                ->options([
                    'image' => 'Image',
                    'video' => 'Video (File)',
                    'youtube' => 'Video (YouTube)'
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
            Text::make('URL', 'url')
                ->hideFromIndex(),
            Text::make('Name', 'name')
                ->rules('required'),
            Text::make('title', 'title')
                ->rules('requiured'),
            Text::make('subtitle', 'subtitle')
                ->rules('requiured'),
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
        return [
            Select::make('Type', 'type')
                ->options([
                    'image' => 'Image',
                    'video' => 'Video (File)',
                    'youtube' => 'Video (YouTube)'
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
            Text::make('URL', 'url')
                ->hideFromIndex(),
            Text::make('Name', 'name')
                ->rules('required'),
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
