<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $service = null;
        if (isset($this["service_id"])) {
            $serviceModel = app(\App\Models\Service::class)::find($this["service_id"]);
            $service = $serviceModel ? new \App\Http\Resources\ServiceResource($serviceModel) : null;
        }
        return [
            'service_id' => $this["service_id"] ?? null,
            'service' => $service,
            'amount' => $this["amount"],
        ];
    }
}
