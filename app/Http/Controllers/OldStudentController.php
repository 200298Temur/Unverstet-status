<?php

namespace App\Http\Controllers;

use App\Http\Requests\OldStudentRequest;
use App\Http\Resources\OldStudentResource;
use App\Models\OldStudent;
use App\Services\OldStudentService;
use App\Services\ResultService;
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

    public function create(OldStudentRequest $OldStudentRequest)
    {
        // Talaba ma'lumotlarini yaratish
        $data = $this->OldStudentService->create($OldStudentRequest);
        
        // Resultlarni yangilash uchun ResultService chaqirish
        app(ResultService::class)->updateAllResults();

        // Resursni qaytarish
        return new OldStudentResource($data);
    }



    public function update(OldStudentRequest  $OldStudentRequest,string $id){
        $data=$this->OldStudentService->update( $OldStudentRequest,$id);
        app(ResultService::class)->updateAllResults();
        return new OldStudentResource($data);
    }

    public function delete(OldStudentRequest  $OldStudentRequest){
        app(ResultService::class)->updateAllResults();
        return $this->OldStudentService->delete( $OldStudentRequest);
    }
    
}
