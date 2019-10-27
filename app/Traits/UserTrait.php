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
            $data = self::exceptAttributes($request, ['password']);
        }

        return $data;
    }

    static function bcryptPassword($password) {
        return bcrypt($password);
    }

    static function exceptAttributes(Request $request, Array $attributes) {
        return $request->except($attributes);
    }
}
