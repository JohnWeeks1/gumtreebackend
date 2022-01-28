<?php

namespace App\Services;

use Illuminate\Http\Request;

class UserService
{
    /**
     * Updated user.
     *
     * @param Request $request
     *
     * @return void
     */
    public function updateUser(Request $request) : void
    {
        $user = auth()->user();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;

        // $saved = $user->save();

        // if (!$saved) {
        //     abort(500, 'Error updating user');
        // }
    }
}
