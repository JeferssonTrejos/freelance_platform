<?php
// Resource para exponer los datos de un pago
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'project_id' => $this->project_id,
            'milestone_id' => $this->milestone_id,
            'client_id' => $this->client_id,
            'freelancer_id' => $this->freelancer_id,
            'amount' => $this->amount,
            'platform_fee' => $this->platform_fee,
            'status' => $this->status,
            'released_at' => $this->released_at,
            'disputed_at' => $this->disputed_at,
            'released_by' => $this->released_by,
            'disputed_by' => $this->disputed_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
