<?php

namespace App\Nova\Repeater;

use Laravel\Nova\Fields\Repeater\Repeatable;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class OurStoryBenefits extends Repeatable
{
    /**
     * Get the fields displayed by the repeatable.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
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
            Number::make('Amount', 'amount')
                ->rules(['required', 'numeric'])
                ->min(0)
                ->step(1),
            Text::make('Title', 'title')
                ->rules(['required', 'max:70'])
        ];
    }
}
