<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProposalResource extends JsonResource
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
            'freelancer_id' => $this->freelancer_id,
            'project_id' => $this->project_id,
            'approach' => $this->approach,
            'timeline_details' => $this->timeline_details,
            'budget_breakdown' => $this->budget_breakdown,
            'examples' => $this->examples,
            'terms' => $this->terms,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
