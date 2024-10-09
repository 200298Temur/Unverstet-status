<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use App\Services\TypeService;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    protected $typeservice;
    public function __construct(TypeService $typeService){
        $this->typeservice=$typeService;
    }


    public function getAll(){
        $data=$this->typeservice->getAll();
        return TypeResource::collection($data);
    }

    public function getOne(TypeRequest $typeRequest){
        $data=$this->typeservice->getone($typeRequest->id);
        return new TypeResource($data);
    }

    public function create(TypeRequest $typeRequest){
        $data=$this->typeservice->create($typeRequest);
        return new TypeResource($data);
    }

    public function update(TypeRequest $typeRequest,Type $type){
        $data=$this->typeservice->update($typeRequest,$type);
        return new TypeResource($data);
    }

    public function delete(TypeRequest $typeRequest){
        return $this->typeservice->delete($typeRequest);
    }
}
