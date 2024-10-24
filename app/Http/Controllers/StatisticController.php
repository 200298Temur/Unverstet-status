<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatisticRequest;
use App\Models\Statistic;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Statistics",
 *     description="Everything about statistics"
 * )
 */
class StatisticController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/statistics",
     *     summary="Get all statistics",
     *     tags={"Statistics"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Statistic")
     *     )
     * )
     */
    public function getAll()
    {
        return Statistic::all();  // Barcha statistikani qaytaradi
    }

    /**
     * @OA\Post(
     *     path="/api/statistics",
     *     summary="Create a new statistic",
     *     tags={"Statistics"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StatisticRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Statistic created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Statistic")
     *     )
     * )
     */
    public function create(StatisticRequest $request)
    {
        $statistic = Statistic::create($request->validated());
        return response()->json($statistic, 201); // Yangi statistikani yaratadi
    }

    /**
     * @OA\Put(
     *     path="/api/statistics/{id}",
     *     summary="Update an existing statistic",
     *     tags={"Statistics"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Statistic ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StatisticRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Statistic updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Statistic")
     *     )
     * )
     */
    public function update(StatisticRequest $request, $id)
    {
        $statistic = Statistic::findOrFail($id);
        $statistic->update($request->validated());
        return response()->json($statistic);  // Statistikani yangilaydi
    }

    /**
     * @OA\Delete(
     *     path="/api/statistics/{id}",
     *     summary="Delete a statistic",
     *     tags={"Statistics"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Statistic ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Statistic deleted successfully"
     *     )
     * )
     */
    public function delete($id)
    {
        Statistic::findOrFail($id)->delete();
        return response()->json(null, 204);  // Statistikani o'chiradi
    }
}
