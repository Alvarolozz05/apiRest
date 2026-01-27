<?php

namespace App\Http\Controllers;

use App\Models\Artifact;
use Illuminate\Http\Request;

class ArtifactController extends Controller {
    public function index() {
        return Artifact::all();
    }

    public function store(Request $request) {
        $artifact = Artifact::create($request->all());
        return response()->json($artifact, 201);
    }

    public function show($id) {
        return Artifact::with(['originRealm', 'heroes'])->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $artifact = Artifact::findOrFail($id);
        $artifact->update($request->all());
        return $artifact;
    }

    public function destroy($id) {
        Artifact::destroy($id);
        return response()->json(null, 204);
    }

    public function heroes($id) {
        return Artifact::findOrFail($id)->heroes;
    }

    public function top() {
        return Artifact::where('power_level', '>', 90)->get();
    }
}