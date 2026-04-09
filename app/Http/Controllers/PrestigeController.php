<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestige;

class PrestigeController extends Controller
{
    /**
     * Public listing — only show available (active) accommodations.
     * Paginate for performance as the portfolio grows.
     */
    public function index(Request $request)
    {
        $car = Prestige::where('availability', true)
            ->latest()
            ->paginate(12);

        return view('transport', compact('car'));
    }

    /**
     * Public detail page for a single accommodation.
     */
    public function show($carId)
    {
        $car = Prestige::findOrFail($carId);
        return view('carInfo', compact('car'));
    }
}
