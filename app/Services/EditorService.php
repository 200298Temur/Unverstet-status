<?php

namespace App\Services;

use App\Http\Requests\EditorRequest;
use App\Models\Editor;
class EditorService{
    public function getAll(){   
        return Editor::with(['unverset'])->get();;
    }

    public function getone($id){
        try {
            return Editor::findOrFail($id);
        } catch (\Exception $e) {
            return null;  
        }
    }

    public function create(EditorRequest $EditorRequest){
        $data=$EditorRequest->validated();
        return Editor::create($data);
    }

    public function update(EditorRequest $EditorRequest,Editor $Editor){
        $data=$EditorRequest->validated();
        $Editor->update($data);
        return $Editor;
    }
    public function delete(EditorRequest $EditorRequest){
        return Editor::where('id',$EditorRequest->id)->delete();
    }
}