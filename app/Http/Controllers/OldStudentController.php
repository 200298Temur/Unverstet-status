<?php

namespace App\Http\Controllers;

use App\Http\Requests\OldStudentRequest;
use App\Http\Resources\OldStudentResource;
use App\Models\OldStudent;
use App\Services\OldStudentService;
use Illuminate\Http\Request;

class OldStudentController extends Controller
{
    protected $OldStudentService;
    public function __construct(OldStudentService $OldStudentService){
        $this->OldStudentService=$OldStudentService;
    }


    public function getAll(){
        $data=$this->OldStudentService->getAll();
        return OldStudentResource::collection($data);
    }

    public function getOne(OldStudentRequest  $OldStudentRequest){
        $data=$this->OldStudentService->getone( $OldStudentRequest->id);
        return new OldStudentResource($data);
    }

    public function create(OldStudentRequest  $OldStudentRequest){
        $data=$this->OldStudentService->create( $OldStudentRequest);
        return new OldStudentResource($data);
    }

    public function update(OldStudentRequest  $OldStudentRequest,OldStudent $Program){
        $data=$this->OldStudentService->update( $OldStudentRequest,$Program);
        return new OldStudentResource($data);
    }

    public function delete(OldStudentRequest  $OldStudentRequest){
        return $this->OldStudentService->delete( $OldStudentRequest);
    }
    
}
