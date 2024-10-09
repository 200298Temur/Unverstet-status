<?php

namespace App\Observers;

use App\Models\UniversityStatistic;
use App\Models\Result;
class StatisticObserver
{
    public function created(UniversityStatistic $universityStatistic)
    {
        $this->updateResultScore($universityStatistic);
    }

    public function updated(UniversityStatistic $universityStatistic)
    {
        $this->updateResultScore($universityStatistic);
    }

    private function updateResultScore(UniversityStatistic $universityStatistic)
    {
        $statistics = UniversityStatistic::where('university_id', $universityStatistic->university_id)->get();

        $totalScore = $statistics->sum(function ($stat) {
            return $stat->employment_rate + $stat->average_income + $stat->employment_growth_rate;
        });

        $result = Result::where('unverstet_id', $universityStatistic->university_id)->first();
        if ($result) {
            $result->total_score = $totalScore;
            $result->save();
        } else {
            Result::create([
                'unverstet_id' => $universityStatistic->university_id,
                'total_score' => $totalScore,
            ]);
        }
    }
    
}
