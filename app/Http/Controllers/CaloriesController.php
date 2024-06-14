<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CaloriesService;

class CaloriesController extends Controller
{
    protected $caloriesService;

    public function __construct(CaloriesService $caloriesService)
    {
        $this->caloriesService = $caloriesService;
    }

    public function showForm()
    {
        return view('nutrition');
    }

    public function getNutrition(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:1500',
        ]);

        $query = $request->input('query');
        $nutritionInfo = $this->caloriesService->getNutritionInfo($query);

        if (isset($nutritionInfo['error'])) {
            return view('nutrition', ['error' => $nutritionInfo['message']]);
        }

        return view('nutrition', ['nutritionInfo' => $nutritionInfo]);
    }
}
