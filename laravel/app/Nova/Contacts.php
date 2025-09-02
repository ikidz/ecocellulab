<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

class Contacts extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Contacts>
     */
    public static $model = \App\Models\Contacts::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public function title(){
        return $this->display_name;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'fname',
        'lname',
        'email',
        'subject',
        'message',
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
            Text::make('Contact Name', function () {
                return $this->display_name;
            })->onlyOnIndex(),
            Text::make('First Name', 'fname')
                ->hideFromIndex(),
            Text::make('Last Name', 'lname')
                ->hideFromIndex(),
            Text::make('Email')
                ->sortable()
                ->rules('required', 'email'),
            Text::make('Subject')
                ->hideFromIndex(),
            Textarea::make('Message'),
            Text::make('Submitted at', function () {
                return $this->display_submitted_at;
            })->onlyOnIndex(),
            Boolean::make('Is Read', 'is_read')
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
        return [
            new Filters\ContactIsRead(),
            new Filters\CreatedDateStart(),
            new Filters\CreatedDateEnd(),
        ];
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
        return [
            (new Actions\ContactMarkAsRead())->showInLine(),
        ];
    }

    public static function authorizedToCreate(Request $request)
    {
        return false; // Disable creation of new contacts via Nova
    }
    public function authorizedToUpdate(Request $request)
    {
        return false; // Disable updating of contacts via Nova
    }
    public function authorizedToReplicate(Request $request)
    {
        return false; // Disable replicating contacts via Nova
    }
}
