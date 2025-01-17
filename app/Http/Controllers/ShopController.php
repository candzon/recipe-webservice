<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop as ModelsShop;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $shops = ModelsShop::all();
        return response()->json($shops, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        try {
            $shop = ModelsShop::create([
                'name' => $request->name,
                'location' => $request->location,
                'description'=> $request->description,
                'image'=> $request->image
            ]);
            return response()->json($shop, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create shop', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $shop = ModelsShop::findOrFail($id, ['name', 'location']);
            return response()->json($shop, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Shop not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
