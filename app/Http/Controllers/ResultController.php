<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Services\ResultService;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    protected $resultservive;
    public function __construct(ResultService $resultService){
        $this->resultservive=$resultService;
    }
    public function getAll(){
        return Result::with('');
    }

}
