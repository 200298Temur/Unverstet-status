<?php

namespace App\Http\Controllers;

use App\Models\OldStudent;
use App\Models\Result;
use App\Models\Unverstet;
use App\Services\ResultService;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    protected $resultservive;
    public function __construct(ResultService $resultService){
        $this->resultservive=$resultService;
    }
    public function getAll(){
        return Result::with('Unverstet')->get();
    }

    public function create(Request $request){
        $total_score = 0;
        // Faqat id ni olish
        $university_id = $request->data['id']; 
        
        $data = Result::create([
            'total_score' => $total_score,
            'unverstet_id' => $university_id,
        ]);
        
        return $data;
    }

    function calculator($id){
        $data=OldStudent::where('');
        
        
        return 'id orqali unverstetni balini hisoblash';
    }
    public function update(Request $request)
    {
        
        $results = Result::all();


        foreach($results as $result){
            $total_score = $this->calculator($result->unverstet_id); 
            $result->total_score = $total_score;
            $result->save();
        }
        
        return response()->json(['message' => 'Results updated successfully'], 200);
    }


    public function delete(Request $request, Unverstet $unverstet)
    {

    }



}
