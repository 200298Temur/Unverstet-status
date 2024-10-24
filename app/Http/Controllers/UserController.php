<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Laravel API Documentation",
 *      description="This is a sample Laravel API documentation using Swagger",
 *      @OA\Contact(
 *          email="temuru502@gmail.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 */
class UserController extends Controller
{

    protected $UserService;
    public function __construct(UserService $UserService){
        $this->UserService=$UserService;
    }

    
   /**
     * @OA\Get(
     *     path="/user/getall",
     *     tags={"User"},
     *     summary="Get all users",
     *     description="Returns a list of all users",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/UserResource")
     *         )
     *     )
     * )
     */

    public function index(){
        $data=$this->UserService->getAll();
        return UserResource::collection($data);
    }

     /**
     * @OA\Get(
     *     path="/user/getOne/{id}",
     *     tags={"User"},
     *     summary="Get a single user",
     *     description="Returns a user by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/UserResource")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found",
     *     )
     * )
     */
    public function getOne(Request $request)
    {
        // Fetch the university from the service
        $User = $this->UserService->getone($request->id);

        // Check if the university is not found (null), return 404 response
        if (!$User) {
            return response()->json(['error' => 'University not found'], 404);
        }

        // Return the model wrapped in a resource
        return new UserResource($User);
    }


/**
     * @OA\Post(
     *     path="/user/create",
     *     tags={"User"},
     *     summary="Create a new user",
     *     description="Creates a new user and returns the created user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UserRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/UserResource")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *     )
     * )
     */
    public function create(UserRequest $request){
        $data=$this->UserService->create($request);
        return new UserResource($data);
    }
 /**
     * @OA\Put(
     *     path="/user/update/{id}",
     *     tags={"User"},
     *     summary="Update a user",
     *     description="Updates an existing user",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UserRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/UserResource")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found",
     *     )
     * )
     */
    public function update(UserRequest $UserRequest,string $id){
        $data=$this->UserService->update($UserRequest,$id);
        return new UserResource($data);
    }
/**
     * @OA\Delete(
     *     path="/user/delete/{id}",
     *     tags={"User"},
     *     summary="Delete a user",
     *     description="Deletes a user by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="User deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function delete(UserRequest $UserRequest){
        return $this->UserService->delete($UserRequest);
    }
}
