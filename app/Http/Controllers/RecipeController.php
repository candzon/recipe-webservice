<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Recipe;
use App\Models\Recipe as ModelsRecipe;
use Illuminate\Database\Eloquent\ModelNotFoundException as Exception;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $recipes = ModelsRecipe::all(); 
        return response()->json($recipes, 200);
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
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'nullable|string',
                'duration' => 'required|string',
                'servings' => 'required|string',
                'ingredients' => 'required|array',
                'instructions' => 'required|array',
            ]);

            $recipe = new ModelsRecipe();
            $recipe->name = $request->input('name');
            $recipe->image = $request->input('image');
            $recipe->duration = $request->input('duration');
            $recipe->servings = $request->input('servings');
            $recipe->ingredients = json_encode($request->input('ingredients'));
            $recipe->instructions = json_encode($request->input('instructions'));
            $recipe->save();

            return response()->json($recipe, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create recipe', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $recipe = ModelsRecipe::findOrFail($id);
            return response()->json($recipe, 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Recipe not found', 'error' => $e->getMessage()], 404);
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
