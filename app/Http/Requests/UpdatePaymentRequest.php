<?php
// Request para validar la actualización de un pago
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'project_id' => 'exists:projects,_id',
            'milestone_id' => 'nullable|exists:milestones,_id',
            'client_id' => 'exists:clients,_id',
            'freelancer_id' => 'exists:freelancers,_id',
            'amount' => 'numeric|min:0',
            'platform_fee' => 'nullable|numeric|min:0',
            'status' => 'in:pending,held,released,disputed,refunded',
            'released_at' => 'nullable|date',
            'disputed_at' => 'nullable|date',
            'released_by' => 'nullable|string',
            'disputed_by' => 'nullable|string',
        ];
    }
}
