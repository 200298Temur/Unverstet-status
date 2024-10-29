<?php
namespace App\Http\Controllers;

use App\Models\Result;
use App\Services\ResultService;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Result",
 *     description="Everything about Results"
 * )
 */
class ResultController extends Controller
{
    protected $resultService;

    public function __construct(ResultService $resultService)
    {
        $this->resultService = $resultService;
    }

    /**
     * @OA\Get(
     *     path="/api/results",
     *     tags={"Result"},
     *     summary="Barcha natijalarni olish",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Result"))
     *     )
     * )
     */
    public function getAll()
    {
        return $this->resultService->getAllResults();
    }

    /**
     * @OA\Post(
     *     path="/api/results",
     *     tags={"Result"},
     *     summary="Natija yaratish",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successfully created",
     *         @OA\JsonContent(ref="#/components/schemas/Result")
     *     )
     * )
     */
    public function create(Request $request)
    {
        $university_id = $request->data['id'];
        $data = $this->resultService->createResult($university_id);
        return $data;
    }

    /**
     * @OA\Put(
     *     path="/api/results",
     *     tags={"Result"},
     *     summary="Barcha natijalarni yangilash",
     *     @OA\Response(
     *         response=200,
     *         description="Successfully updated",
     *         @OA\JsonContent(ref="#/components/schemas/Result")
     *     )
     * )
     */
    public function update(Request $request)
    {
        return $this->resultService->updateAllResults();
    }

    /**
     * @OA\Delete(
     *     path="/api/results/{id}",
     *     tags={"Result"},
     *     summary="Natijani o'chirish",
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
    public function delete(Request $request)
    {
        return $this->resultService->deleteResultByUniversityId($request->id);
    }
}
