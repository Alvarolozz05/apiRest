<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller {
    public function index() {
        return Hero::all();
    }

    public function store(Request $request) {
        $hero = Hero::create($request->all());
        return response()->json($hero, 201);
    }

    public function show($id) {
        return Hero::with(['realm', 'artifacts'])->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $hero = Hero::findOrFail($id);
        $hero->update($request->all());
        return $hero;
    }

    public function destroy($id) {
        Hero::destroy($id);
        return response()->json(null, 204);
    }

    public function artifacts($id) {
        return Hero::findOrFail($id)->artifacts;
    }

    public function alive() {
        return Hero::where('alive', true)->get();
    }
}
