<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\Http\Resources\ProgramResource;
use App\Models\Program;
use App\Services\ProgramService;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Program",
 *     description="Program CRUD operations"
 * )
 */
class ProgramController extends Controller
{
    protected $ProgramService;

    public function __construct(ProgramService $ProgramService)
    {
        $this->ProgramService = $ProgramService;
    }

    /**
     * @OA\Get(
     *     path="/api/programs",
     *     tags={"Program"},
     *     summary="Get all programs",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Program"))
     *     )
     * )
     */
    public function getAll(Request $request)
    {
        $data = $this->ProgramService->getAll($request);
        return ProgramResource::collection($data);
    }

    /**
     * @OA\Get(
     *     path="/api/programs/{id}",
     *     tags={"Program"},
     *     summary="Get a single program",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Program")
     *     )
     * )
     */
    public function getOne(ProgramRequest $ProgramRequest)
    {
        $data = $this->ProgramService->getone($ProgramRequest->id);
        return new ProgramResource($data);
    }

    /**
     * @OA\Post(
     *     path="/api/programs",
     *     tags={"Program"},
     *     summary="Create a new program",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Program")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successfully created",
     *         @OA\JsonContent(ref="#/components/schemas/Program")
     *     )
     * )
     */
    public function create(ProgramRequest $ProgramRequest)
    {
        $data = $this->ProgramService->create($ProgramRequest);
        return new ProgramResource($data);
    }

    /**
     * @OA\Put(
     *     path="/api/programs/{id}",
     *     tags={"Program"},
     *     summary="Update an existing program",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Program")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully updated",
     *         @OA\JsonContent(ref="#/components/schemas/Program")
     *     )
     * )
     */
    public function update(ProgramRequest $ProgramRequest, string $id)
    {
        $data = $this->ProgramService->update($ProgramRequest, $id);
        return new ProgramResource($data);
    }

    /**
     * @OA\Delete(
     *     path="/api/programs/{id}",
     *     tags={"Program"},
     *     summary="Delete a program",
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
    public function delete(ProgramRequest $ProgramRequest)
    {
        return $this->ProgramService->delete($ProgramRequest);
    }
}
