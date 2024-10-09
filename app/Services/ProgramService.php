<?php
 namespace App\Services;

use App\Http\Requests\ProgramRequest;
use App\Models\Program;

class ProgramService{
    public function getAll(){   
        return Program::with(['unverset', 'type'])->get();;
    }

    public function getone($id){
        try {
            return Program::findOrFail($id);
        } catch (\Exception $e) {
            return null;  
        }
    }

    public function create(ProgramRequest $ProgramRequest){
        $data=$ProgramRequest->validated();
        return Program::create($data);
    }

    public function update(ProgramRequest $ProgramRequest,Program $Program){
        $data=$ProgramRequest->validated();
        $Program->update($data);
        return $Program;
    }
    public function delete(ProgramRequest $ProgramRequest){
        return Program::where('id',$ProgramRequest->id)->delete();
    }
}