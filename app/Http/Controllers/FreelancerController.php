<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use App\Http\Requests\StoreFreelancerRequest;
use App\Http\Requests\UpdateFreelancerRequest;
use App\Http\Resources\FreelancerResource;
use Illuminate\Http\Response;

class FreelancerController extends Controller
{
    // Listar todos los freelancers
    public function index()
    {
        $freelancers = Freelancer::paginate(10);
        return FreelancerResource::collection($freelancers);
    }

    // Crear nuevo freelancer
    public function store(StoreFreelancerRequest $request)
    {
        $freelancer = Freelancer::create($request->validated());
        return (new FreelancerResource($freelancer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    // Mostrar freelancer específico
    public function show($id)
    {
        $freelancer = Freelancer::find($id);

        return $freelancer
            ? new FreelancerResource($freelancer)
            : response()->json(['error' => 'Freelancer no encontrado'], 404);
    }

    // Actualizar freelancer
    public function update(UpdateFreelancerRequest $request, $id)
    {
        $freelancer = Freelancer::find($id);

        if (!$freelancer) {
            return response()->json(['error' => 'Freelancer no encontrado'], 404);
        }

        $data = $request->validated();

        $freelancer->update($data);
        return new FreelancerResource($freelancer);
    }

    // Eliminar freelancer
    public function destroy($id)
    {
        $freelancer = Freelancer::find($id);

        if (!$freelancer) {
            return response()->json(['error' => 'Freelancer no encontrado'], 404);
        }

        $freelancer->delete();
        return response()->json(null, 204);
    }
}