<?php

namespace App\Services;

use App\Http\Requests\UnverstetRequest;
use App\Models\Unverstet;
use Exception;
use GuzzleHttp\Psr7\Request;

class UnverstetService{
    public function getUniversities()
    {
        return Unverstet::orderBy('id', 'desc')->get();
    }


    public function createUnverstet(UnverstetRequest $request){
        $data = $request->validated();
        $tag=Unverstet::create($data);
        return $tag;
    }

    public function update(UnverstetRequest $request,Unverstet $unverstet){
        $data=$request->validated();
        $unverstet->update($data);
        return $unverstet;
    }

    public function getUniverstet($id)
    {
        try {
            // Return the university or null if not found
            return Unverstet::findOrFail($id);
        } catch (\Exception $e) {
            return null;  // Return null if the university is not found
        }
    }



    public function  detele(UnverstetRequest $unverstetRequest){
        return Unverstet::where('id',$unverstetRequest->id)->delete();
    }
}