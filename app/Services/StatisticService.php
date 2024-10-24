<?php

namespace App\Services;

use App\Http\Requests\StatisticRequest;
use App\Models\Statistic;

class StatisticService {
    public function getAll() {   
        return Statistic::with(['unverset', 'type'])->get();
    }

    public function getOne($id) {
        return Statistic::with(['unverset', 'type'])->find($id); // Ehtimol, aloqa ma'lumotlari bilan birga qaytaring
    }

    public function create(StatisticRequest $statisticRequest) {
        $data = $statisticRequest->validated();
        return Statistic::create($data);
    }

    public function update(StatisticRequest $statisticRequest, string $id) {
        $statistic = Statistic::findOrFail($id);
        $data = $statisticRequest->validated();
        $statistic->update($data);
        return $statistic;
    }

    public function delete(StatisticRequest $statisticRequest) {
        $statistic = Statistic::find($statisticRequest->id);
        if ($statistic) {
            return $statistic->delete();
        }
        return null; // Ma'lumot topilmasa null qaytarish
    }
}
