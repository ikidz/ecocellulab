<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

use Alexwenzel\DependencyContainer\HasDependencies;
use Alexwenzel\DependencyContainer\DependencyContainer;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Benefits extends Resource
{
    use HasSortableRows, HasDependencies;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Benefits>
     */
    public static $model = \App\Models\Benefits::class;

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
        'subtitle'
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
            // ID::make()->sortable(),
            Select::make('Display Type', 'display_type')
                ->options([
                    'icon' => 'Icon',
                    'image' => 'Image'
                ])
                ->default('icon')
                ->displayUsingLabels()
                ->rules(['required']),
            Text::make('Icon/Image', function(){
                if ($this->display_type === 'image' && $this->img) {
                    return "<img src='" . $this->display_img . "' style='max-width: 100px; max-height: 100px;'>";
                }else if ($this->display_type === 'icon' && $this->icon) {
                    return $this->icon ? "<i class='icon-{$this->icon}' style='font-size:24px;'></i>" : '';
                }
                return '';
            })->asHtml()
            ->exceptOnForms(),
            DependencyContainer::make([
                Image::make('Image', 'img')
                    ->disk(config("filesystems.default"))
                    ->path('benefits')
                    ->rules(['mimes:jpg,jpeg,png,gif,webp,svg', 'max:2048'])
                    ->help("Support *.png,*.jpg,*.svg")
                    ->onlyOnForms(),
            ])->dependsOn('display_type', 'image'),
            DependencyContainer::make([
                Select::make('Icon', 'icon')
                    ->options([
                        'doctor-1' => 'Doctor',
                        'Group-604' => 'Group 604',
                        'investor-1' => 'Investor',
                        'progress-report' => 'Progress Report',
                        'dna-structure' => 'DNA Structure',
                        'intellectual' => 'Intellectual Property',
                        'microscope-1' => 'Microscope',
                        'ultrasound' => 'Ultrasound'
                        // Add more icons as needed
                    ])
                    ->rules(['required'])
                    ->searchable()
                    ->displayUsingLabels(),
            ])->dependsOn('display_type', 'icon'),
            Text::make('Title', 'title')
                ->rules(['required', 'max:255']),
            Text::make('Subtitle', 'subtitle')
                ->hideFromIndex(),
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
