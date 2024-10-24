<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnverstetRequest;
use App\Http\Resources\UnverstetResource;
use App\Services\ResultService;
use App\Services\UnverstetService;
use Illuminate\Http\Request;

/**
 * Class UnverstetController
 * 
 * @OA\Tag(
 *     name="Universities",
 *     description="API for managing universities"
 * )
 */
class UnverstetController extends Controller
{
    protected $unverstetService;

    public function __construct(UnverstetService $unverstetService)
    {
        $this->unverstetService = $unverstetService;
    }

    /**
     * @OA\Get(
     *     path="/unverstet",
     *     summary="Get all universities",
     *     tags={"Universities"},
     *     @OA\Response(
     *         response=200,
     *         description="List of universities",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/UnverstetResource"))
     *     ),
     * )
     */
    public function index()
    {
        $data = $this->unverstetService->getUniversities();
        return UnverstetResource::collection($data);
    }

    /**
     * @OA\Get(
     *     path="/unverstet/{id}",
     *     summary="Get a single university",
     *     tags={"Universities"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response=200,
     *         description="University details",
     *         @OA\JsonContent(ref="#/components/schemas/UnverstetResource")
     *     ),
     *     @OA\Response(response=404, description="University not found")
     * )
     */
    public function getOne(Request $request)
    {
        $unverstet = $this->unverstetService->getUniverstet($request->id);

        if (!$unverstet) {
            return response()->json(['error' => 'University not found'], 404);
        }

        return new UnverstetResource($unverstet);
    }

    /**
     * @OA\Post(
     *     path="/unverstet/create",
     *     summary="Create a new university",
     *     tags={"Universities"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UnverstetRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="University created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/UnverstetResource")
     *     ),
     *     @OA\Response(response=400, description="Invalid input")
     * )
     */
    public function create(UnverstetRequest $request)
    {
        $data = $this->unverstetService->createUnverstet($request);
        app(ResultService::class)->createResult($data->id);
        return new UnverstetResource($data);
    }

    /**
     * @OA\Put(
     *     path="/unverstet/update/{id}",
     *     summary="Update an existing university",
     *     tags={"Universities"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UnverstetRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="University updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/UnverstetResource")
     *     ),
     *     @OA\Response(response=404, description="University not found"),
     *     @OA\Response(response=400, description="Invalid input")
     * )
     */
    public function update(UnverstetRequest $unverstetRequest, string $id)
    {
        $data = $this->unverstetService->update($unverstetRequest, $id);
        app(ResultService::class)->updateAllResults();
        return new UnverstetResource($data);
    }

    /**
     * @OA\Delete(
     *     path="/unverstet/delete/{id}",
     *     summary="Delete a university",
     *     tags={"Universities"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response=204,
     *         description="University deleted successfully"
     *     ),
     *     @OA\Response(response=404, description="University not found")
     * )
     */
    public function delete(UnverstetRequest $unverstetRequest)
    {
        app(ResultService::class)->deleteResultByUniversityId($unverstetRequest->id);
        return $this->unverstetService->delete($unverstetRequest);
    }
}
