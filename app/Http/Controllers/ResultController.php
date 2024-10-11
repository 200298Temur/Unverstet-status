<?php

namespace App\Http\Controllers;

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

    function calculatror($id){
        return 'id orqali unverstetni balini hisoblash';
    }
    public function update(Request $request, Unverstet $unverstet)
    {
        $unverstet=$unverstet->id;
        $unvers=Result::get();

        
        
        return 'update';
    }

    public function delete(Request $request, Unverstet $unverstet)
    {
        // 1. Universitetni id orqali olish va o'chirish
        $unverstet->delete();

        // 2. Total_score ni 0 qilish yoki boshqa biror amalni bajarish
        $total_score = 0;

        // 3. O'chirish muvaffaqiyatli bo'lsa, javob qaytarish
        return response()->json([
            'message' => 'Unverstet o\'chirildi',
            'total_score' => $total_score,
        ]);
    }



}
