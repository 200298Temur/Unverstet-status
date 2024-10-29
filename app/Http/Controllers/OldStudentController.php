<?php

namespace App\Http\Controllers;

use App\Http\Requests\OldStudentRequest;
use App\Http\Resources\OldStudentResource;
use App\Models\OldStudent;
use App\Services\OldStudentService;
use App\Services\ResultService;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="OldStudent",
 *     description="OldStudent CRUD operations"
 * )
 */
class OldStudentController extends Controller
{
    protected $OldStudentService;

    public function __construct(OldStudentService $OldStudentService)
    {
        $this->OldStudentService = $OldStudentService;
    }

    /**
     * @OA\Get(
     *     path="/api/old-students",
     *     tags={"OldStudent"},
     *     summary="Get all old students",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/OldStudent"))
     *     )
     * )
     */
    public function getAll()
    {
        $data = $this->OldStudentService->getAll();
        return OldStudentResource::collection($data);
    }

    /**
     * @OA\Get(
     *     path="/api/old-students/{id}",
     *     tags={"OldStudent"},
     *     summary="Get a single old student",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/OldStudent")
     *     )
     * )
     */
    public function getOne(OldStudentRequest $OldStudentRequest)
    {
        $data = $this->OldStudentService->getone($OldStudentRequest->id);
        return new OldStudentResource($data);
    }

    /**
     * @OA\Post(
     *     path="/api/old-students",
     *     tags={"OldStudent"},
     *     summary="Create a new old student",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/OldStudent")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successfully created",
     *         @OA\JsonContent(ref="#/components/schemas/OldStudent")
     *     )
     * )
     */
    public function create(OldStudentRequest $OldStudentRequest)
    {
        // Talaba ma'lumotlarini yaratish
        $data = $this->OldStudentService->create($OldStudentRequest);
        
        // Resultlarni yangilash uchun ResultService chaqirish
        app(ResultService::class)->updateAllResults();

        // Resursni qaytarish
        return new OldStudentResource($data);
    }

    /**
     * @OA\Put(
     *     path="/api/old-students/{id}",
     *     tags={"OldStudent"},
     *     summary="Update an existing old student",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/OldStudent")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully updated",
     *         @OA\JsonContent(ref="#/components/schemas/OldStudent")
     *     )
     * )
     */
    public function update(OldStudentRequest $OldStudentRequest, string $id)
    {
        $data = $this->OldStudentService->update($OldStudentRequest, $id);
        app(ResultService::class)->updateAllResults();
        return new OldStudentResource($data);
    }

    /**
     * @OA\Delete(
     *     path="/api/old-students/{id}",
     *     tags={"OldStudent"},
     *     summary="Delete an old student",
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
    public function delete(OldStudentRequest $OldStudentRequest)
    {
        app(ResultService::class)->updateAllResults();
        return $this->OldStudentService->delete($OldStudentRequest);
    }
}
