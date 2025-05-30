<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Http\Resources\ProposalResource;
use App\Http\Requests\StoreProposalRequest;
use App\Http\Requests\UpdateProposalRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Proposal::query();
        if ($request->has('project_id')) {
            $query->where('project_id', $request->project_id);
        }
        if ($request->has('freelancer_id')) {
            $query->where('freelancer_id', $request->freelancer_id);
        }
        $proposals = $query->paginate(10);
        return ProposalResource::collection($proposals)->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProposalRequest $request)
    {
        $proposal = Proposal::create($request->validated());
        return (new ProposalResource($proposal))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Proposal $proposal)
    {
        return (new ProposalResource($proposal))->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProposalRequest $request, Proposal $proposal)
    {
        $proposal->update($request->validated());
        return (new ProposalResource($proposal))->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proposal $proposal)
    {
        $proposal->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
