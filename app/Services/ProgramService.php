<?php
 namespace App\Services;

use App\Http\Requests\ProgramRequest;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramService{
    public function getAll(Request $request){   
        return Program::where('unverstet_id',$request->id)->with(['unverset', 'type'])->get();;
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

    public function update(ProgramRequest $ProgramRequest,string $id){
        $data=$ProgramRequest->validated();
        $Program=Program::findOrFail($id);
        $Program->update($data);
        return $Program;
    }
    public function delete(ProgramRequest $ProgramRequest){
        return Program::where('id',$ProgramRequest->id)->delete();
    }
}