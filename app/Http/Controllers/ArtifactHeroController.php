<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class ArtifactHeroController extends Controller {
    public function store(Request $request) {
        $hero = Hero::findOrFail($request->hero_id);
        $hero->artifacts()->attach($request->artifact_id);

        return response()->json(['message' => 'Artifact assigned'], 201);
    }

    public function destroy(Request $request) {
        $hero = Hero::findOrFail($request->hero_id);
        $hero->artifacts()->detach($request->artifact_id);

        return response()->json(['message' => 'Artifact removed'], 200);
    }
}
