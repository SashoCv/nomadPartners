<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HomePageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            [
                'type' => 'hero',
                'title' => $this->titleHeroSection,
                'subtitle' => $this->subtitleHeroSection,
                'backgroundImage' => $this->imageHeroSectionPath ? asset('storage/' . $this->imageHeroSectionPath) : null,
                'button' => [
                    'text' => $this->buttonHeroSection ? $this->buttonHeroSection->text : null,
                ],
            ],
            [
                'type' => 'partners',
                'partners' => $this->partners->map(function ($partner) {
                    return [
                        'name' => $partner->namePartner,
                        'image' => asset('storage/' . $partner->logoPath),
                        'link' => $partner->linkPartner,
                    ];
                }),
            ],
            [
                'type' => 'testimonials',
                'testimonials' => [
                    [
                        'title' => $this->testimonialTitleOne,
                        'content' => $this->testimonialContentOne,
                        'link' => $this->linkTestimonialOne,
                    ],
                    [
                        'title' => $this->titleTestimonialTwo,
                        'content' => $this->contentTestimonialTwo,
                        'link' => $this->linkTestimonialTwo,
                    ],
                    [
                        'title' => $this->titleTestimonialThree,
                        'content' => $this->contentTestimonialThree,
                        'link' => $this->linkTestimonialThree,
                    ],
                ],
            ],
            [
                'type' => 'about',
                'title' => $this->titleAbout,
                'subtitle' => $this->subtitleAbout,
                'content' => $this->contentAbout,
                'titleWhoWeAre' => $this->titleWhoWeAre,
                'contentWhoWeAre' => $this->contentWhoWeAre,
                'imageWhoWeAre' => $this->whoWeArePictureAboutUs ? asset('storage/' . $this->whoWeArePictureAboutUs) : null,
            ],
            [
                'type' => 'live',
                'title' => $this->liveTitle,
                'content' => $this->liveContent,
                'image' => $this->livePicturePath ? asset('storage/' . $this->livePicturePath) : null,
            ],
            [
                'type' => 'choose_us',
                'title' => $this->chooseUsTitle,
                'content' => $this->chooseUsContent,
                'list' => [
                    [
                        'title' => $this->listTitleOne,
                        'content' => $this->listContentOne,
                    ],
                    [
                        'title' => $this->listTitleTwo,
                        'content' => $this->listContentTwo,
                    ],
                    [
                        'title' => $this->listTitleThree,
                        'content' => $this->listContentThree,
                    ],
                ],
            ],
            [
                'type' => 'mission',
                'title' => $this->missionTitle,
                'content' => $this->missionContent,
                'images' => [
                    [
                        'name' => $this->missionPictureNameOne,
                        'path' => $this->missionPicturePathOne ? asset('storage/' . $this->missionPicturePathOne) : null,
                    ],
                    [
                        'name' => $this->missionPictureNameTwo,
                        'path' => $this->missionPicturePathTwo ? asset('storage/' . $this->missionPicturePathTwo) : null,
                    ],
                    [
                        'name' => $this->missionPictureNameThree,
                        'path' => $this->missionPicturePathThree ? asset('storage/' . $this->missionPicturePathThree) : null,
                    ],
                ],
            ],
        ];
    }
}
