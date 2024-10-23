<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatisticRequest;
use App\Http\Resources\StatisticResource;
use App\Models\Statistic;
use App\Services\StatisticService;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    protected $statisticService;
    public function __construct(StatisticService $statisticService){
        $this->statisticService=$statisticService;
    }


    public function getAll(){
        $data=$this->statisticService->getAll();
        return StatisticResource::collection($data);
    }

    public function getOne(StatisticRequest  $statisticRequest){
        $data=$this->statisticService->getone( $statisticRequest->id);
        return new StatisticResource($data);
    }

    public function create(StatisticRequest  $statisticRequest){
        $data=$this->statisticService->create( $statisticRequest);
        return new StatisticResource($data);
    }

    public function update(StatisticRequest  $statisticRequest,string $id){
        $data=$this->statisticService->update( $statisticRequest,$id);
        return new StatisticResource($data);
    }

    public function delete(StatisticRequest  $statisticRequest){
        return $this->statisticService->delete( $statisticRequest);
    }
}
