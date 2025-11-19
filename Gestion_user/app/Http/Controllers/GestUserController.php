<?php

namespace App\Http\Controllers;
use App\Models\Gest_user;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class GestUserController extends Controller
{
    //
    public function index(): JsonResponse
    {
        $gest_users = Gest_user::all();
        return response()->json($gest_users, 200);
    }
   public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            
        ]);

        $gest_user = Gest_user::create($validated);

        return response()->json($gest_user, 201);
    }

    public function show(Gest_user $gest_user): JsonResponse
    {
        return response()->json($gest_user, 200);
    }

    public function update(Request $request, Gest_user $gest_user): JsonResponse
    {
        $validated = $request->validate([
          
            'gender',
        'title',
        'first',
        'last',
        'location',
        'city',
        'state',
        'country',
        'postcode',
        'coordinates',
        'timezone',
        'email',
        'login',
        'registered',
        'phone',  
        ]);

        $gest_user->update($validated);

        return response()->json($gest_user, 200);
    }

    public function destroy( $gest_user): JsonResponse
    {
        $gest_user->delete();
        return response()->json(null, 204);
    }

}
