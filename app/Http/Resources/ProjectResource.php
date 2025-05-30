<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'client_id' => $this->client_id,
            'client' => new ClientResource($this->whenLoaded('client')),
            'title' => $this->title,
            'description' => $this->description,
            'budget' => $this->budget,
            'expected_timeline' => $this->expected_timeline,
            'specific_deliverables' => $this->specific_deliverables,
            'evaluation_criteria' => $this->evaluation_criteria,
            'required_skills' => $this->required_skills,
            'project_proposals' => $this->project_proposals,
        ];
    }
}
