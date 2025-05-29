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
            'project_id' => $this->project_id,
            'cover_letter' => $this->cover_letter,
            'bid_amount' => $this->bid_amount,
            'status' => $this->status
        ];
    }
}
