<?php

namespace App\Http\Controllers;

use App\Services\RegionalService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(RegionalService $regionalService): View
    {
        $featuredCities = $regionalService->getFeaturedCities(24);
        $allCities = $regionalService->getAllCities();

        return view('home', compact('featuredCities', 'allCities'));
    }
}
