<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMilestoneRequest;
use App\Http\Requests\UpdateMilestoneRequest;
use App\Http\Resources\MilestoneResource;
use Illuminate\Http\Response;
use App\Models\Milestone;

class MilestoneController extends Controller
{
    public function index(Request $request)
    {
        $milestones = Milestone::query();

        if ($request->has('proposal_id')) {
            $milestones->where('proposal_id', $request->proposal_id);
        }

        if ($request->has('status')) {
            $milestones->where('status', $request->status);
        }

        return (MilestoneResource::collection($milestones->paginate(10)))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(StoreMilestoneRequest $request) // ✅ Sin espacio extra
    {
        $data = $request->validated();
        
        if (!isset($data['status'])) {
            $data['status'] = 'pending';
        }
        if (!isset($data['deliverables'])) {
            $data['deliverables'] = [];
        }

        $milestone = Milestone::create($data);

        return (new MilestoneResource($milestone))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Request $request, Milestone $milestone)
    {
        return (new MilestoneResource($milestone))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function update(UpdateMilestoneRequest $request, Milestone $milestone)
    {
        $milestone->update($request->validated());

        return (new MilestoneResource($milestone))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Milestone $milestone)
    {
        $milestone->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}