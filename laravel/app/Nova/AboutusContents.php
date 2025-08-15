<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use Laravel\Nova\Fields\Repeater;
use App\Nova\Repeater\OurStoryBenefits;
use Laravel\Nova\Http\Requests\NovaRequest;

use Webard\NovaSunEditor\SunEditor;

class AboutusContents extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\AboutusContents>
     */
    public static $model = \App\Models\AboutusContents::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'page_title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'page_title',
        'slug',
        'story_content',
        'vision_content'
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
            Text::make('Page Title', 'page_title')
                ->rules(['required', 'max:255']),
            Image::make('Banner image','banner_img')
                    ->disk(config("filesystems.default"))
                    ->path('aboutus/page_banners')
                    ->rules(['max:2048','image'])
                    ->help("Support *.png,*.jpg")
                    ->hideFromIndex(),
            Boolean::make('Is Published', 'is_publish')
                ->default(1),
            new Panel('Home Section', $this->homeSectionFields()),
            new Panel('Our Story', $this->storyFields()),
            new Panel('Vision', $this->visionFields()),
            new Panel('SEO', $this->seoFields()),
        ];
    }

    public function homeSectionFields()
    {
        return [
            Text::make('Home Section Title', 'home_section_title')
                ->rules(['required', 'max:255'])
                ->hideFromIndex(),
            Image::make('Home Section Image', 'home_section_img')
                ->disk(config("filesystems.default"))
                ->path('aboutus/home_section')
                ->rules(['max:2048', 'image'])
                ->help("Support *.png,*.jpg")
                ->hideFromIndex(),
            SunEditor::make('Home Section Content', 'home_section_content')
                ->withFiles('public','aboutus/home_section')
                ->settings([
                    'imageUploadUrl'   => route('custom-suneditor.upload', [
                        'resource' => static::uriKey(), // "banners"
                        'field'    => 'home_section_content',
                    ]),
                    'imageUploadParam' => 'file', // 👈 force the key name
                    'imageUploadHeader' => [
                        'X-Requested-With' => 'XMLHttpRequest',
                        'X-CSRF-TOKEN'     => csrf_token(),
                    ],
                ])
                ->rules(['required'])
                ->hideFromIndex(),
        ];
    }

    public function storyFields()
    {
        return [
            Image::make('Story image', 'story_img')
                ->disk(config("filesystems.default"))
                ->path('aboutus')
                ->rules(['max:2048', 'image'])
                ->help("Support *.png,*.jpg")
                ->hideFromIndex(),
            SunEditor::make('Our story', 'story_content')
                ->withFiles('public','banners/story_content')
                ->settings([
                    'imageUploadUrl'   => route('custom-suneditor.upload', [
                        'resource' => static::uriKey(), // "banners"
                        'field'    => 'story_content',
                    ]),
                    'imageUploadParam' => 'file', // 👈 force the key name
                    'imageUploadHeader' => [
                        'X-Requested-With' => 'XMLHttpRequest',
                        'X-CSRF-TOKEN'     => csrf_token(),
                    ],
                ])
                ->rules(['required'])
                ->hideFromIndex(),
            Repeater::make('Benefits', 'benefits')
                ->repeatables([
                    OurStoryBenefits::make('Benefit')->confirmRemoval()
                ])->asJson(),
            Text::make('Benefits', function(){
                if( $this->benefits ){
                    $output = '';
                    foreach ($this->benefits as $benefit) {
                        $fields = $benefit['fields'] ?? [];

                        $output .= "<div class='flex items-center mb-2'>";
                        if (isset($fields['icon'])) {
                            $output .= "<i class='icon-{$fields['icon']}' style='font-size:24px;'></i><br />";
                        }
                        if (isset($fields['amount'])) {
                            $output .= "<span class='ml-2 font-bold'>(".number_format($fields['amount']).")</span><br />";
                        }
                        if (isset($fields['title'])) {
                            $output .= "<span class='ml-2'>{$fields['title']}</span>";
                        }
                        $output .= "</div>";
                    }

                    return $output;
                }
                return 'No benefits added yet.';
            })->onlyOnDetail()
            ->asHtml()
        ];
    }

    public function visionFields()
    {
        return [
            Image::make('Vision image', 'vision_img')
                ->disk(config("filesystems.default"))
                ->path('aboutus')
                ->rules(['max:2048', 'image'])
                ->help("Support *.png,*.jpg")
                ->hideFromIndex(),
            SunEditor::make('Vision content', 'vision_content')
                ->rules(['required'])
                ->hideFromIndex()
        ];
    }

    public function seoFields()
    {
        return [
            Slug::make('Slug', 'slug')
                ->rules(['required', 'max:255'])
                ->creationRules('unique:aboutus_contents,slug')
                ->updateRules('unique:aboutus_contents,slug,{{resourceId}}')
                ->from('page_title')
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
                ->path('aboutus/meta')
                ->rules(['image', 'max:2048'])
                ->help("Support *.png,*.jpg. File size should not exceed 2MB.")
                ->hideFromIndex()
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

    public static function label()
    {
        return 'About Us Page';
    }
}
