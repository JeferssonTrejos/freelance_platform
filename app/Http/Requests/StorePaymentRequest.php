<?php
// Request para validar la creación de un pago
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'project_id' => 'required|exists:projects,_id',
            'milestone_id' => 'nullable|exists:milestones,_id',
            'client_id' => 'required|exists:clients,_id',
            'freelancer_id' => 'required|exists:freelancers,_id',
            'amount' => 'required|numeric|min:0',
            'platform_fee' => 'nullable|numeric|min:0',
            'status' => 'in:pending,held,released,disputed,refunded',
        ];
    }
}
