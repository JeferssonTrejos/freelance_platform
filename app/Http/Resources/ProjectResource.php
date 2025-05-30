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
            'client' => new ClientResource($this->whenLoaded('client')),
            'title' => $this->title,
            'description' => $this->description,
            'budget' => $this->budget,
            'expected_timeline' => $this->expected_timeline,
            'specific_deliverables' => SpecificDeliverablesResource::collection($this->specific_deliverables),
            'evaluation_criteria' => EvaluationCriteriaResource::collection($this->evaluation_criteria),
            'required_skills' => RequiredSkillsResource::collection($this->required_skills),
            'Project_proposals' => ProjectProposalsResource::collection($this->whenLoaded('proposals')),

        ];
    }
}
