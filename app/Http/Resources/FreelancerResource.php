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
            'id' => $this->_id,
            'name' => $this->name,
            'portfolio' => PortfolioResource::collection(collect($this->portfolio)),
            'experience' => $this->experience,
            'education' => $this->education,
            'certifications' => $this->certifications,
            'languages' => $this->languages,
            'availability' => $this->availability,
            'rates' => $this->rates,
        ];
    }
}
