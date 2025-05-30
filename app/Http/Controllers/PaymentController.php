<?php
// Controlador para pagos: CRUD y acciones de liberar/disputar
namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Resources\PaymentResource;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Listar pagos con paginación
    public function index()
    {
        return PaymentResource::collection(Payment::paginate(10));
    }

    // Crear pago (retención de fondos)
    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->validated());
        return new PaymentResource($payment);
    }

    // Mostrar pago
    public function show(Payment $payment)
    {
        return new PaymentResource($payment);
    }

    // Actualizar pago
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->validated());
        return new PaymentResource($payment);
    }

    // Eliminar pago
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return response()->json(null, 204);
    }

    // Liberar fondos por hito completado
    public function release(Payment $payment)
    {
        $payment->status = 'released';
        $payment->released_at = now();
        $payment->released_by = 'admin'; 
        $payment->save();
        return new PaymentResource($payment);
    }

    // Marcar disputa
    public function dispute(Payment $payment)
    {
        $payment->status = 'disputed';
        $payment->disputed_at = now();
        $payment->disputed_by = 'client'; 
        $payment->save();
        return new PaymentResource($payment);
    }
}
