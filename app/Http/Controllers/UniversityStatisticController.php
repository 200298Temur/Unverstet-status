<?php

namespace App\Http\Controllers;

use App\Models\UniversityStatistic;
use Illuminate\Http\Request;
class UniversityStatisticController extends Controller
{
    public function index()
    {
        $statistics = UniversityStatistic::with('university')->get();
        return response()->json($statistics);
    }

    public function store(Request $request)
    {
        $request->validate([
            'university_id' => 'required|exists:unverstets,id',
            'employment_rate' => 'required|numeric',
            'average_income' => 'required|numeric',
            'employment_growth_rate' => 'required|numeric',
            'year' => 'required|integer',
        ]);

        $statistic = UniversityStatistic::create($request->all());
        return response()->json($statistic, 201);
    }

    public function show($id)
    {
        $statistic = UniversityStatistic::with('university')->findOrFail($id);
        return response()->json($statistic);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'university_id' => 'exists:unverstets,id',
            'employment_rate' => 'numeric',
            'average_income' => 'numeric',
            'employment_growth_rate' => 'numeric',
            'year' => 'integer',
        ]);

        $statistic = UniversityStatistic::findOrFail($id);
        $statistic->update($request->all());
        return response()->json($statistic);
    }

    public function destroy($id)
    {
        $statistic = UniversityStatistic::findOrFail($id);
        $statistic->delete();
        return response()->json(null, 204);
    }
}
