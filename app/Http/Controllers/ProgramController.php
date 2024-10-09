<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\Http\Resources\ProgramResource;
use App\Models\Program;
use App\Services\ProgramService;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    protected $ProgramService;
    public function __construct(ProgramService $ProgramService){
        $this->ProgramService=$ProgramService;
    }


    public function getAll(){
        $data=$this->ProgramService->getAll();
        return ProgramResource::collection($data);
    }

    public function getOne(ProgramRequest  $ProgramRequest){
        $data=$this->ProgramService->getone( $ProgramRequest->id);
        return new ProgramResource($data);
    }

    public function create(ProgramRequest  $ProgramRequest){
        $data=$this->ProgramService->create( $ProgramRequest);
        return new ProgramResource($data);
    }

    public function update(ProgramRequest  $ProgramRequest,Program $Program){
        $data=$this->ProgramService->update( $ProgramRequest,$Program);
        return new ProgramResource($data);
    }

    public function delete(ProgramRequest  $ProgramRequest){
        return $this->ProgramService->delete( $ProgramRequest);
    }
}
