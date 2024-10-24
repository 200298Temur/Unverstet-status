<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Http\Resources\TypeResource;
use App\Services\TypeService;
use Illuminate\Http\Request;

/**
 * Class TypeController
 * 
 * @OA\Tag(
 *     name="Types",
 *     description="API for managing types"
 * )
 */
class TypeController extends Controller
{
    protected $typeservice;

    public function __construct(TypeService $typeService)
    {
        $this->typeservice = $typeService;
    }

    /**
     * @OA\Get(
     *     path="/types",
     *     summary="Get all types",
     *     tags={"Types"},
     *     @OA\Response(
     *         response=200,
     *         description="List of types",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/TypeResource"))
     *     ),
     * )
     */
    public function getAll()
    {
        $data = $this->typeservice->getAll();
        return TypeResource::collection($data);
    }

    /**
     * @OA\Get(
     *     path="/types/{id}",
     *     summary="Get a single type",
     *     tags={"Types"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response=200,
     *         description="Type details",
     *         @OA\JsonContent(ref="#/components/schemas/TypeResource")
     *     ),
     *     @OA\Response(response=404, description="Type not found")
     * )
     */
    public function getOne(TypeRequest $typeRequest)
    {
        $data = $this->typeservice->getone($typeRequest->id);
        return new TypeResource($data);
    }

    /**
     * @OA\Post(
     *     path="/types/create",
     *     summary="Create a new type",
     *     tags={"Types"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/TypeRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Type created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/TypeResource")
     *     ),
     *     @OA\Response(response=400, description="Invalid input")
     * )
     */
    public function create(TypeRequest $typeRequest)
    {
        $data = $this->typeservice->create($typeRequest);
        return new TypeResource($data);
    }

    /**
     * @OA\Put(
     *     path="/types/update/{id}",
     *     summary="Update an existing type",
     *     tags={"Types"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/TypeRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Type updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/TypeResource")
     *     ),
     *     @OA\Response(response=404, description="Type not found"),
     *     @OA\Response(response=400, description="Invalid input")
     * )
     */
    public function update(TypeRequest $typeRequest, string $id)
    {
        $data = $this->typeservice->update($typeRequest, $id);
        return new TypeResource($data);
    }

    /**
     * @OA\Delete(
     *     path="/types/delete/{id}",
     *     summary="Delete a type",
     *     tags={"Types"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response=204,
     *         description="Type deleted successfully"
     *     ),
     *     @OA\Response(response=404, description="Type not found")
     * )
     */
    public function delete(TypeRequest $typeRequest)
    {
        return $this->typeservice->delete($typeRequest);
    }
}
