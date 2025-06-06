<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MilestoneResource extends JsonResource
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
            'proposal_id' => $this->proposal_id,
            'title' => $this->title,
            'due_date' => $this->due_date,
            'deliverables' => $this->deliverables ?? [],
            'status' => $this->status,
        ];
    }
}
