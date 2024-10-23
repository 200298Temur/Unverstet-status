<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditorRequest;
use App\Http\Resources\EditorResource;
use App\Models\Editor;
use App\Services\EditorService;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    protected $EditorService;
    public function __construct(EditorService $EditorService){
        $this->EditorService=$EditorService;
    }


    public function getAll(){
        $data=$this->EditorService->getAll();
        return EditorResource::collection($data);
    }

    public function getOne(EditorRequest  $EditorRequest){
        $data=$this->EditorService->getone( $EditorRequest->id);
        return new EditorResource($data);
    }

    public function create(EditorRequest  $EditorRequest){
        $data=$this->EditorService->create( $EditorRequest);
        return new EditorResource($data);
    }

    public function update(EditorRequest  $EditorRequest,string $id){
        $data=$this->EditorService->update( $EditorRequest,$id);
        return new EditorResource($data);
    }

    public function delete(EditorRequest  $EditorRequest){
        return $this->EditorService->delete( $EditorRequest);
    }
}
