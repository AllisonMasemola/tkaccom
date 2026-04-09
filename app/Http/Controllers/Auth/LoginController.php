<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\SystemAdmin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\ResponseFromApiResource;
use Symfony\Component\HttpFoundation\Response;

/**
 * APIs for managing system admins.
 */

class LoginController extends Controller
{

    /**
     * Display a listing of system admins.
     */
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection(SystemAdmin::filtered()->paginateWithOptions());
    }

    /**
     * Store a newly created system admin in storage.
     */
    public function store(StoreRequest $request): Jsonresponse
    {
        $user = SystemAdmin::create($request->validated(null, null));

        return response()->json(new UserResource($user), Response::HTTP_CREATED);
    }

    /**
     * Display the system admin details.
     */
    public function show(Request $request, SystemAdmin $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Update the specified system admin in storage.
     */
    public function update(UpdateRequest $request, SystemAdmin $user): JsonResponse
    {
        $user->update($request->validated(null, null));

        return response()->json(new UserResource($user), Response::HTTP_OK);
    }

    /**
     * Remove the specified system admin from storage.
     */
    public function destroy(Request $request, SystemAdmin $user): JsonResponse
    {
        try {
            $user->delete();
        } catch (\Exception) {
            abort(Response::HTTP_INTERNAL_SERVER_ERROR, 'Failed destroying user');
        }

        return response()->json()->setStatusCode(Response::HTTP_NO_CONTENT);
    }

    /**
     * Restore an archived system admin.
     */
    public function restore(Request $request, SystemAdmin $user): JsonResponse
    {
        $user->restore();

        return response()->json(new UserResource($user), Response::HTTP_OK);
    }
}
