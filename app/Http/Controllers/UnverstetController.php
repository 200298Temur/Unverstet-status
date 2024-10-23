<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnverstetRequest;
use App\Http\Resources\UnverstetResource;
use App\Models\Unverstet;
use App\Providers\UnverstetProvider;
use App\Services\ResultService;
use App\Services\UnverstetService;
use Illuminate\Http\Request;

class UnverstetController extends Controller
{
    protected $unverstetService;
    public function __construct(UnverstetService $unverstetService){
        $this->unverstetService=$unverstetService;
    }

    public function index(){
        $data=$this->unverstetService->getUniversities();
        return UnverstetResource::collection($data);
    }
    public function getOne(Request $request)
    {
        // Fetch the university from the service
        $unverstet = $this->unverstetService->getUniverstet($request->id);

        // Check if the university is not found (null), return 404 response
        if (!$unverstet) {
            return response()->json(['error' => 'University not found'], 404);
        }

        // Return the model wrapped in a resource
        return new UnverstetResource($unverstet);
    }

    public function create(UnverstetRequest $request){
        $data=$this->unverstetService->createUnverstet($request);
        app(ResultService::class)->createResult($data->id);
        return new UnverstetResource($data);
    }

    public function update(UnverstetRequest $unverstetRequest,string $id){
        $data=$this->unverstetService->update($unverstetRequest,$id);
        app(ResultService::class)->updateAllResults();
        return new UnverstetResource($data);
    }

    public function delete(UnverstetRequest $unverstetRequest){
        app(ResultService::class)->deleteResultByUniversityId($unverstetRequest->id);
        return $this->unverstetService->detele($unverstetRequest);
    }
}
