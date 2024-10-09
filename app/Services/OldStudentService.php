<?php

namespace App\Services;

use App\Http\Requests\OldStudentRequest;
use App\Models\OldStudent;

class OldStudentService{
    public function getAll(){   
        return OldStudent::with(['program','user'])->get();;
    }

    public function getone($id){
        try {
            return OldStudent::findOrFail($id);
        } catch (\Exception $e) {
            return null;  
        }
    }

    public function create(OldStudentRequest $OldStudentRequest){
        $data=$OldStudentRequest->validated();
        return OldStudent::create($data);
    }

    public function update(OldStudentRequest $OldStudentRequest,OldStudent $OldStudent){
        $data=$OldStudentRequest->validated();
        $OldStudent->update($data);
        return $OldStudent;
    }
    public function delete(OldStudentRequest $OldStudentRequest){
        return OldStudent::where('id',$OldStudentRequest->id)->delete();
    }
}