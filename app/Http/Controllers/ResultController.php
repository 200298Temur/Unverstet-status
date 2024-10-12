<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Services\ResultService;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    protected $resultService;

    public function __construct(ResultService $resultService)
    {
        $this->resultService = $resultService;
    }

    public function getAll()
    {
        // Barcha natijalarni olish uchun servisdan foydalanamiz
        return $this->resultService->getAllResults();
    }

    public function create(Request $request)
    {
        // Faqat universitet ID ni olamiz va natija yaratamiz
        $university_id = $request->data['id']; 
        $data = $this->resultService->createResult($university_id);
        return $data;
    }

    public function update(Request $request)
    {
        // Barcha natijalarni yangilash
        return $this->resultService->updateAllResults();
    }

    public function delete(Request $request)
    {
        // Universitet ID bo'yicha natijani o'chirish
        return $this->resultService->deleteResultByUniversityId($request->id);
    }
}
