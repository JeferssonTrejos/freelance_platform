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
    public function index()
    {

        $milestones = Milestone::paginate(10);
        ;
        return MilestoneResource::collection($milestones)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(StoreMilestoneRequest $request)
    {

        $milestone = Milestone::create($request->validated());
        return (new MilestoneResource($milestone))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $milestone = Milestone::find($id);
        return (new MilestoneResource($milestone))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function update(UpdateMilestoneRequest $request, Milestone $milestone)
    {
        $data = $request->validated();
        if (isset($data['deliverables']) && !is_array($data['deliverables'])) {
            $data['deliverables'] = [$data['deliverables']];
        }
        $milestone->update($data);
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