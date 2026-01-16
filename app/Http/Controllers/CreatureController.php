<?php

namespace App\Http\Controllers;

use App\Models\Creature;
use Illuminate\Http\Request;

class CreatureController extends Controller {
    public function index() {
        return Creature::all();
    }

    public function store(Request $request) {
        $creature = Creature::create($request->all());
        return response()->json($creature, 201);
    }

    public function show($id) {
        return Creature::with('region')->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $creature = Creature::findOrFail($id);
        $creature->update($request->all());
        return $creature;
    }

    public function destroy($id) {
        Creature::destroy($id);
        return response()->json(null, 204);
    }

    public function dangerous(Request $request) {
        return Creature::where('danger_level', '>=', $request->level)->get();
    }
}
