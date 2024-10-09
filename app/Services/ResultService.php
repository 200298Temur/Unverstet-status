<?php 

namespace App\Services;

use App\Models\Result;

class ResultService{
    public  function getAll(){
        return Result::with('unverset')->orderBy('total_score','desc')->all();
    }
}