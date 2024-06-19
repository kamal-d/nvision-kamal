<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use App\Http\Controllers\OrderController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['throttle:api'])->group(function () {
    Route::apiResource('/orders', OrderController::class)->middleware('auth:sanctum');
});


Route::post('/auth/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'store_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    return $user->createToken($request->store_name)->plainTextToken;
});