<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtifactController;
use App\Http\Controllers\ArtifactHeroController;
use App\Http\Controllers\CreatureController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\RealmController;
use App\Http\Controllers\RegionController;

// Usuario autenticado
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


/*
    RUTAS ESPECÍFICAS (Primero)
*/
// Heroes
Route::get('heroes/alive', [HeroController::class, 'alive']);
Route::get('heroes/{id}/artifacts', [HeroController::class, 'artifacts']);

// Artifacts
Route::get('artifacts/top', [ArtifactController::class, 'top']);
Route::get('artifacts/{id}/heroes', [ArtifactController::class, 'heroes']);

// Realms
Route::get('realms/{id}/heroes', [RealmController::class, 'heroes']);

// Creatures
Route::get('creatures/dangerous', [CreatureController::class, 'dangerous']);


/*
    RELACÓN MUCHOS A MUCHOS ENTRE ARTIFACTS Y HEROES (PIVOT)
*/
Route::post('artifact-hero', [ArtifactHeroController::class, 'store']);
Route::delete('artifact-hero', [ArtifactHeroController::class, 'destroy']);


/*
    API RESOURCES (AL FINAL)
*/
Route::apiResource('regions', RegionController::class);
Route::apiResource('realms', RealmController::class);
Route::apiResource('heroes', HeroController::class);
Route::apiResource('creatures', CreatureController::class);
Route::apiResource('artifacts', ArtifactController::class);