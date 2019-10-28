<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UserTrait {

    static function processPassword(Request $request) {
        if ($request->password) {
            $request->merge(['password' => self::bcryptPassword($request->password)]);
            $data = $request->all();
        }
        else {
            $data = $request->except('password');
        }

        return $data;
    }

    static function bcryptPassword($password) {
        return bcrypt($password);
    }
}
