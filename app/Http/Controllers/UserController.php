<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $UserService;
    public function __construct(UserService $UserService){
        $this->UserService=$UserService;
    }

    public function index(){
        $data=$this->UserService->getAll();
        return UserResource::collection($data);
    }
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



    public function create(UserRequest $request){
        $data=$this->UserService->create($request);
        return new UserResource($data);
    }

    public function update(UserRequest $UserRequest,User $User){
        $data=$this->UserService->update($UserRequest,$User);
        return new UserResource($data);
    }

    public function delete(UserRequest $UserRequest){
        return $this->UserService->delete($UserRequest);
    }
}
