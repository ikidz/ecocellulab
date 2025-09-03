<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class ProductReviewApproval extends Action
{
    use InteractsWithQueue, Queueable;
    public $name = 'Approve Reviews';
    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $count = 0;
        foreach( $models as $model ){
            if( $model->is_approved == 1 ){
                continue;
            }
            $count++;
            $model->update(['is_approved' => true]);
        }
        if( $count == 0 ){
            return Action::danger('No reviews were approved.');
        }
        return Action::message($count.' Review'.($count>1 ? 's' : '').' approved!');
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [];
    }
}
