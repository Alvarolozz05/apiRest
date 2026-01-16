<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller {
    public function index() {
        return Region::all();
    }

    public function store(Request $request) {
        $region = Region::create($request->all());
        return response()->json($region, 201);
    }

    public function show($id) {
        return Region::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $region = Region::findOrFail($id);
        $region->update($request->all());
        return $region;
    }

    public function destroy($id) {
        Region::destroy($id);
        return response()->json(null, 204);
    }
}
