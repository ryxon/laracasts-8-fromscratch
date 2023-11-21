<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/hello', function () {

    //get all users
    $users = User::all();

    //loop through all users and generate a random api token for each user
    foreach ($users as $user) {
        $user->api_token = Str::random(60);
        $user->save();
    }
    dd($users);

    return response()->json(['message' => 'Hello, this is your Laravel API!']);
});
// routes/api.php

Route::middleware('auth.api')->group(function () {
    Route::get('/secured-endpoint', function () {
        return response()->json(['message' => 'This is a secured endpoint.']);
    });
});
