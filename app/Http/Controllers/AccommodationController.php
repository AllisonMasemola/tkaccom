<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;
use App\Http\Resources\AccommodationResource;
use App\Http\Requests\Accommodation\StoreRequest;
use App\Http\Requests\Accommodation\UpdateRequest;

class AccommodationController extends Controller
{
    /**
     * Public listing — only show available (active) accommodations.
     * Paginate for performance as the portfolio grows.
     */
    public function index(Request $request)
    {
        $accommodations = Accommodation::where('availability', true)
            ->latest()
            ->paginate(12);

        return view('accommodation', compact('accommodations'));
    }

    /**
     * Public detail page for a single accommodation.
     */
    public function show($accommodationId)
    {
        $accommodation = Accommodation::findOrFail($accommodationId);

        return view('accommodationInfo', compact('accommodation'));
    }

}
