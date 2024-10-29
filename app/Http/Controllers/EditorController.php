<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditorRequest;
use App\Http\Resources\EditorResource;
use App\Models\Editor;
use App\Services\EditorService;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Editor",
 *     description="Editor CRUD operations"
 * )
 */
class EditorController extends Controller
{
    protected $EditorService;

    public function __construct(EditorService $EditorService)
    {
        $this->EditorService = $EditorService;
    }

    /**
     * @OA\Get(
     *     path="/api/editors",
     *     tags={"Editor"},
     *     summary="Get all editors",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Editor"))
     *     )
     * )
     */
    public function getAll()
    {
        $data = $this->EditorService->getAll();
        return EditorResource::collection($data);
    }

    /**
     * @OA\Get(
     *     path="/api/editors/{id}",
     *     tags={"Editor"},
     *     summary="Get a single editor",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Editor")
     *     )
     * )
     */
    public function getOne(EditorRequest $EditorRequest)
    {
        $data = $this->EditorService->getone($EditorRequest->id);
        return new EditorResource($data);
    }

    /**
     * @OA\Post(
     *     path="/api/editors",
     *     tags={"Editor"},
     *     summary="Create a new editor",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Editor")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successfully created",
     *         @OA\JsonContent(ref="#/components/schemas/Editor")
     *     )
     * )
     */
    public function create(EditorRequest $EditorRequest)
    {
        $data = $this->EditorService->create($EditorRequest);
        return new EditorResource($data);
    }

    /**
     * @OA\Put(
     *     path="/api/editors/{id}",
     *     tags={"Editor"},
     *     summary="Update an existing editor",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Editor")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully updated",
     *         @OA\JsonContent(ref="#/components/schemas/Editor")
     *     )
     * )
     */
    public function update(EditorRequest $EditorRequest, string $id)
    {
        $data = $this->EditorService->update($EditorRequest, $id);
        return new EditorResource($data);
    }

    /**
     * @OA\Delete(
     *     path="/api/editors/{id}",
     *     tags={"Editor"},
     *     summary="Delete an editor",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Successfully deleted"
     *     )
     * )
     */
    public function delete(EditorRequest $EditorRequest)
    {
        return $this->EditorService->delete($EditorRequest);
    }
}
