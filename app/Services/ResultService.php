<?php

namespace App\Services;

use App\Models\OldStudent;
use App\Models\Result;
use App\Models\Statistic;
use Illuminate\Support\Facades\DB;

class ResultService
{
    public function getAllResults()
    {
        // Universitetlarni natijalar bilan birga olish
        return Result::with('Unverstet')->get();
    }

    public function createResult($unverstet_id)
    {
        // Boshlang'ich natijalar bilan yangi natija yozib qo'shamiz
        $total_score = 0; // Yangi natija yaratilganda boshlang'ich qiymat
        return Result::create([
            'total_score' => $total_score,
            'unverstet_id' => $unverstet_id,
        ]);
    }

    public function calculateScore($unverstet_id)
    {
        // Universitetga tegishli talabalar sonini olish
        $data1 = OldStudent::whereHas('program', function ($query) use ($unverstet_id) {
                $query->where('unverstet_id', $unverstet_id);
            })
            ->where('ruxsat', true)
            ->where('is_working', true)
            ->count();

        // Umumiy talabalarning sonini olish
        $data2 = OldStudent::whereHas('program', function ($query) use ($unverstet_id) {
                $query->where('unverstet_id', $unverstet_id);
            })
            ->where('ruxsat', true)
            ->count();

        // O'rtacha yillik maoshni olish
        $data3 = OldStudent::whereHas('program', function ($query) use ($unverstet_id) {
                $query->where('unverstet_id', $unverstet_id);
            })
            ->where('ruxsat', true)
            ->avg('salaryYear');

        // Nolga bo'linishdan saqlanish
        if ($data2 == 0) {
            return 0;
        }

        $date4=Statistic::where('$unverstet_id',$$unverstet_id)->get();

        // Yakuniy natijani hisoblash
        $total = ($data1 * 100 / $data2 * 10) + ($data3 * 5)+$date4->total_students*2+$date4->total_scholarships*2;
        return $total;
    }

    public function updateAllResults()
    {
        // Barcha natijalarni yangilash
        $results = Result::all();

        foreach ($results as $result) {
            $total_score = $this->calculateScore($result->unverstet_id); 
            $result->total_score = $total_score;
            $result->save();
        }
        return response()->json(['message' => 'Results updated successfully'], 200);
    }

    public function deleteResultByUniversityId($unverstet_id)
    {
        // Universitet ID bo'yicha natijani o'chirish
        try {
            Result::where('unverstet_id', $unverstet_id)->delete();
            return response()->json(['message' => 'Result deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete result', 'error' => $e->getMessage()], 500);
        }
    }
}
