<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Http\Resources\SkillResource;
use App\Http\Resources\SkillResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceResponse;
use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Review::with(['reviewer', 'reviewed', 'project']);

        $perPage = $request->get('per_page', 15);
        $reviews = $query->paginate($perPage);

        return ReviewResource::collection($reviews);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest  $request)
    {
        $review = Review::create($request->validated());
        $review->load(['reviewer', 'reviewed', 'project']);

        return new ReviewResource($review);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $review = Review::with(['reviewer', 'reviewed', 'project'])->findOrFail($id);
        return new ReviewResource($review);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest  $request, string  $id)
    {
        $review = Review::findOrFail($id);
        $review->update($request->validated());
        $review->load(['reviewer', 'reviewed', 'project']);

        return new ReviewResource($review);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return response()->json(['message' => 'Reseña eliminada exitosamente.']);
    }
}
