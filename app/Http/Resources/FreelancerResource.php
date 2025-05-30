<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FreelancerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->_id,
            'name' => $this->name,
            'portfolio' => PortfolioResource::collection($this->portfolio),
            'experience' => ExperienceResource::collection($this->experience),
            'education' => EducationResource::collection($this->education),
            'certifications' => $this->certifications,
            'languages' => $this->languages,
            'availability' => $this->availability,
            'rates' => RateResource::collection($this->rates),
        ];
    }
}
