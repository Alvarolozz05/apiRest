<?php

namespace App\Http\Controllers;

use App\Models\Realm;
use Illuminate\Http\Request;

class RealmController extends Controller {
    public function index() {
        return Realm::all();
    }

    public function store(Request $request) {
        $realm = Realm::create($request->all());
        return response()->json($realm, 201);
    }

    public function show($id) {
        return Realm::with(['region', 'heroes', 'artifacts'])->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $realm = Realm::findOrFail($id);
        $realm->update($request->all());
        return $realm;
    }

    public function destroy($id) {
        Realm::destroy($id);
        return response()->json(null, 204);
    }

    public function heroes($id) {
        return Realm::findOrFail($id)->heroes;
    }
}
