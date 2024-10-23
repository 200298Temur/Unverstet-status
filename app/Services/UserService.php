<?php 
namespace   App\Services;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Container\Attributes\Tag;

class UserService{

    public function getAll(){
        return User::all();
    }

    public function getone($id){
        try {
            // Return the university or null if not found
            return User::findOrFail($id);
        } catch (Exception $e) {
            return null;  // Return null if the university is not found
        }

    }

    public function create(UserRequest $UserRequest){
        $data=$UserRequest->validated();
        return User::create($data);
    }

    public function update(UserRequest $UserRequest,string $id){
        $data=$UserRequest->validated();
        $User=User::findOrFail($id);
        $User->update($data);
        return $User;
    }
    public function delete(UserRequest $UserRequest){
        return User::where('id',$UserRequest->id)->delete();
    }

}