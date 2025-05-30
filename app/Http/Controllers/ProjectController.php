<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Index
     *
     * Listado de todos los proyectos.
     *
     */
    public function index()
    {
        return (ProjectResource::collection(Project::with(['proposals', 'client'])->paginate(4)))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store
     *
     * Crea un nuevo proyecto.
     */
    public function store(Request $request)
    {
        $project = Project::create($request->validated());

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Show
     *
     * Muestra un producto por su Id
     *
     */
    public function show(Project $project)
    {
        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update 
     * 
     * Actualizar un proyecto.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * 
     * Destroy
     * 
     * Eliminar un proyecto por completo.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
