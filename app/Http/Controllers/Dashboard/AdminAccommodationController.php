<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use App\Http\Resources\AccommodationResource;
use App\Http\Requests\Accommodation\StoreRequest;
use App\Http\Requests\Accommodation\UpdateRequest;

class AdminAccommodationController extends Controller
{

    public function index(Request $request)
    {
        $accommodation = Accommodation::get();
        return view('admin.accommodation.index', compact('accommodation'));
    }

    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        try {
            // Handle multi-file image upload — store each file and save paths as JSON
            if ($request->hasFile('images')) {
                $paths = []
                ;
                foreach ($request->file('images') as $image) {
                    $paths[] = $image->store('accommodation-uploads', 'public');
                }
                $validated['images'] = json_encode($paths);
            } else {
                // Default to empty JSON array if no images uploaded
                $validated['images'] = json_encode([]);
            }

            Accommodation::create($validated);

            return redirect()->route('admin.accommodation.index')->with(
                'success',
                'Accommodation created successfully'
            );
        } catch (\Exception $exception) {
            \Log::error('Accommodation creation failed: ' . $exception->getMessage());

            return redirect()->back()->withInput()->with(
                'error',
                'Unable to create accommodation: ' . $exception->getMessage()
            );
        }
    }
    public function show($id)
    {
        $accommodation = Accommodation::findOrFail($id);
        return view('admin.accommodation.show', compact('accommodation'));
    }

    /**
     * Show the edit form pre-populated with existing data.
     * This serves the GET /admin-accommodation/{id}/edit route.
     */
    public function edit($id)
    {
        $accommodation = Accommodation::findOrFail($id);
        return view('admin.accommodation.edit', compact('accommodation'));
    }

    /**
     * Handle the PUT/PATCH update request.
     *
     * NOTE: We use $id instead of implicit route model binding because
     * the route parameter is {admin_accommodation} (from the resource URL)
     * which doesn't match the variable name $accommodation.
     */
    public function update(UpdateRequest $request, $id)
    {
        $accommodation = Accommodation::findOrFail($id);
        $validated = $request->validated();

        try {
            // If new images are uploaded, store them and replace the old JSON
            if ($request->hasFile('images')) {
                $paths = [];
                foreach ($request->file('images') as $image) {
                    $paths[] = $image->store('accommodation-uploads', 'public');
                }
                $validated['images'] = json_encode($paths);
            }

            $accommodation->update($validated);

            return redirect()->route('admin.accommodation.edit', $accommodation->id)->with(
                'success',
                'Accommodation updated successfully'
            );
        } catch (\Exception $exception) {
            \Log::error('Accommodation update failed: ' . $exception->getMessage());

            return redirect()->back()->withInput()->with(
                'error',
                'Unable to update accommodation: ' . $exception->getMessage()
            );
        }
    }

    /**
     * Delete the accommodation record.
     * Redirects back to the listing with a success flash.
     */
    public function destroy($id)
    {
        $accommodation = Accommodation::findOrFail($id);

        try {
            $accommodation->delete();

            return redirect()->route('admin.accommodation.index')->with(
                'success',
                'Accommodation deleted successfully'
            );
        } catch (\Exception $exception) {
            \Log::error('Accommodation deletion failed: ' . $exception->getMessage());

            return redirect()->back()->with(
                'error',
                'Unable to delete accommodation: ' . $exception->getMessage()
            );
        }
    }

}
