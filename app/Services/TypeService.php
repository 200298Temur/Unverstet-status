<?php 
namespace   App\Services;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Exception;
use Illuminate\Container\Attributes\Tag;

class TypeService{

    public function getAll(){
        return Type::all();
    }

    public function getone($id){
        try {
            // Return the university or null if not found
            return Type::findOrFail($id);
        } catch (Exception $e) {
            return null;  // Return null if the university is not found
        }

    }

    public function create(TypeRequest $typeRequest){
        $data=$typeRequest->validated();
        return Type::create($data);
    }

    public function update(TypeRequest $typeRequest,Type $type){
        $data=$typeRequest->validated();
        $type->update($data);
        return $type;
    }
    public function delete(TypeRequest $typeRequest){
        return Type::where('id',$typeRequest->id)->delete();
    }

}