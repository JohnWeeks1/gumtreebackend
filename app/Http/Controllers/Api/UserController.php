<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = User::findOrFail(request()->user()->id);

        } catch (ModelNotFoundException $e) {
            return response()->json($e->getMessage(), 500);
        }

        return response()->json($user , 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;

            $user->save();

        } catch (ModelNotFoundException $e) {
            return response()->json($e->getMessage(), 500);
        }

        return response()->json('User updated', 200);
    }
}
