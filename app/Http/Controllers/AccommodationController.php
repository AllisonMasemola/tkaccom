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
     * Purity's filter() scope reads query params like:
     *   ?filters[apartment_type][$in][]=House
     *   ?filters[rooms][$gte]=2
     *   ?filters[price][$lte]=10000
     * Paginate for performance as the portfolio grows.
     */
    public function index(Request $request)
    {
        $accommodations = Accommodation::where('availability', true)
            ->filter()   // Purity — driven by ?filters[...] query string
            ->latest()
            ->paginate(12)
            ->withQueryString(); // preserve filter params across pagination pages

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
