<?php

namespace App\Services;

use App\Http\Requests\StatisticRequest;
use App\Models\Statistic;

class StatisticService{
    public function getAll(){   
        return Statistic::with(['unverset', 'type'])->get();;
    }

    public function getone($id){
        try {
            return Statistic::findOrFail($id);
        } catch (\Exception $e) {
            return null;  
        }
    }

    public function create(StatisticRequest $StatisticRequest){
        $data=$StatisticRequest->validated();
        return Statistic::create($data);
    }

    public function update(StatisticRequest $StatisticRequest,Statistic $Statistic){
        $data=$StatisticRequest->validated();
        $Statistic->update($data);
        return $Statistic;
    }
    public function delete(StatisticRequest $StatisticRequest){
        return Statistic::where('id',$StatisticRequest->id)->delete();
    }
}