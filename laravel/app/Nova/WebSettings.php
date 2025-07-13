<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Http\Requests\NovaRequest;

use Alexwenzel\DependencyContainer\HasDependencies;
use Alexwenzel\DependencyContainer\DependencyContainer;
use Webard\NovaSunEditor\SunEditor;

class WebSettings extends Resource
{
    use HasDependencies;
    public static $group = 'SETTINGS';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\WebSettings::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'key';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'key',
        'value_th',
        'value_en',
        // 'value_shn'
    ];

    public static $indexDefaultOrder = [
        'id' => 'asc'
    ];
    public static function indexQuery(NovaRequest $request, $query)
    {
        if (empty($request->get('orderBy'))) {
            $query->getQuery()->orders = [];
            return $query->orderBy(key(static::$indexDefaultOrder), reset(static::$indexDefaultOrder));
        }
        return $query;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            // ID::make(__('ID'), 'id')->sortable(),
            Select::make('Type', 'type')
                ->options([
                    'text' => 'Text',
                    'longText' => 'Textbox',
                    'image' => 'Image',
                    'link' => 'Link',
                    'file' => 'File',
                    'tel' => 'Telephone No.',
                    'email' => 'Email Address',
                    'map' => 'Google Map',
                    'code' => 'Script'
                ])
                ->default('text')
                ->displayUsingLabels()
                ->rules(['required']),
            Text::make('Title', 'title')
                ->rules(['required']),
            Text::make('Key', 'key')
                ->readonly()
                ->hideFromIndex(),
            DependencyContainer::make([
                Text::make('Value', 'value_th')
                    ->rules(['required']),
                // Text::make(__('Value (En)'), 'value_en')
                //     ->rules(['required'])
            ])->dependsOn('type', 'text'),
            DependencyContainer::make([
                SunEditor::make('Content', 'value_th')
                    ->rules(['required'])
                    ->hideFromIndex(),
            ])->dependsOn('type','longText'),
            DependencyContainer::make([
                Image::make('Image', 'img')
                    ->disk(config("filesystems.default"))
                    ->path('web_settings')
                    ->rules( ( $this->key == 'SEO_FACEBOOK_IMG' ? ['required','max:1024','image', 'dimensions:width=1200,height=630'] : ['required','max:1024','mimes:jpg,jpeg,png,gif,webp,svg'] ) )
                    ->help("Support *.png,*.jpg size must not exceed more than 1 Mb".( $this->key == 'SEO_FACEBOOK_IMG' ? '. Image dimension must by 1200x630 pixels only' : '' ))
                    ->hideFromIndex(),
            ])->dependsOn('type','image'),
            DependencyContainer::make([
                File::make('Image', 'img')
                    ->disk(config("filesystems.default"))
                    ->path('web_settings')
                    ->rules(['required','max:20480','mimes:pdf'])
                    ->help("Support *.pdf size must not exceed more than 20 Mb")
                    ->hideFromIndex(),
            ])->dependsOn('type','file'),
            DependencyContainer::make([
                Code::make('Script', 'value_th'),
            ])->dependsOn('type','code'),
            DependencyContainer::make([
                Text::make('URL', 'value_th')
                    ->hideFromIndex()
                    ->help('Link will open new tab on browser when click'),
            ])->dependsOn('type','link'),
            DependencyContainer::make([
                Text::make('Telephone No.', 'value_th')
	                ->hideFromIndex()
            ])->dependsOn('type','tel'),
            DependencyContainer::make([
                Text::make('Email', 'value_th')
                    ->hideFromIndex()
	                ->help('Use "," for multiple email address')
            ])->dependsOn('type','email'),
            DependencyContainer::make([
                Text::make('Google Map', 'value_th')
	                ->hideFromIndex()
	                ->help('Example : '.htmlentities('<iframe src="..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'))
            ])->dependsOn('type','map')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    public static function label()
    {
        return __('Web Settings');
    }

    public static function singularLabel()
    {
        return __('Web Setting');
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToUpdate(Request $request)
    {
        return true;
    }
    public function authorizedToDelete(Request $request)
    {
        return false;
    }
    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }

    public static function availableForNavigation( Request $request ){
        return true;
    }
    public function authorizedToReplicate(Request $request){
        return false;
    }
}
