<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Prestige;
use Illuminate\Http\Request;
use App\Http\Resources\PrestigeResource;
use App\Http\Requests\Prestige\StoreRequest;
use App\Http\Requests\Prestige\UpdateRequest;

class AdminPrestigeController extends Controller
{

    public function index(Request $request)
    {
        $prestige = Prestige::get();
        return view('admin.prestige.index', compact('prestige'));
    }

    public function store(StoreRequest $request)
    {
        // dd($request->all());

        $validated = $request->validated();

        try {
            // Handle multi-file image upload — store each file and save paths as JSON
            if ($request->hasFile('image')) {
                $paths = []
                ;
                foreach ($request->file('image') as $image) {
                    $paths[] = $image->store('prestige-uploads', 'public');
                }
                $validated['image'] = json_encode($paths);
            } else {
                // Default to empty JSON array if no images uploaded
                $validated['image'] = json_encode([]);
            }

            // dd($validated);
            Prestige::create($validated);

            return redirect()->route('admin.prestige.index')->with(
                'success',
                'Car created successfully'
            );
        } catch (\Exception $exception) {
            \Log::error('Car creation failed: ' . $exception->getMessage());

            return redirect()->back()->withInput()->with(
                'error',
                'Unable to create car: ' . $exception->getMessage()
            );
        }
    }
    public function show($id)
    {
        $prestige = Prestige::findOrFail($id);
        return view('admin.prestige.show', compact('prestige'));
    }

    /**
     * Show the edit form pre-populated with existing data.
     * This serves the GET /admin-accommodation/{id}/edit route.
     */
    public function edit($id)
    {
        $prestige = Prestige::findOrFail($id);
        return view('admin.prestige.edit', compact('prestige'));
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
        $prestige = Prestige::findOrFail($id);
        $validated = $request->validated();

        try {
            // If new images are uploaded, store them and replace the old JSON
            if ($request->hasFile('image')) {
                $paths = [];
                foreach ($request->file('image') as $image) {
                    $paths[] = $image->store('prestige-uploads', 'public');
                }
                $validated['image'] = json_encode($paths);
            }

            $prestige->update($validated);

            return redirect()->route('admin.prestige.edit', $prestige->id)->with(
                'success',
                'Car updated successfully'
            );
        } catch (\Exception $exception) {
            \Log::error('Car update failed: ' . $exception->getMessage());

            return redirect()->back()->withInput()->with(
                'error',
                'Unable to update car: ' . $exception->getMessage()
            );
        }
    }

    /**
     * Delete the accommodation record.
     * Redirects back to the listing with a success flash.
     */
    public function destroy($id)
    {
        $prestige = Prestige::findOrFail($id);

        try {
            $prestige->delete();

            return redirect()->route('admin.prestige.index')->with(
                'success',
                'Car deleted successfully'
            );
        } catch (\Exception $exception) {
            \Log::error('Car deletion failed: ' . $exception->getMessage());

            return redirect()->back()->with(
                'error',
                'Unable to delete car: ' . $exception->getMessage()
            );
        }
    }

}
