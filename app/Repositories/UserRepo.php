<?php


namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;

class UserRepo extends BaseRepo
{
    public function getModel()
    {
        return new User();
    }

    public function selectDatatable() {
        $query = $this->getModel()
            ->select('users.*');

        return $query;
    }

    public function store(Request $request, User $user = null) {
        if (!is_null($user)) {
            if ($request->password) {
                $request->merge(['password' => bcrypt($request->password)]);
                $this->update($user, $request->all());
            }
            else {
                $this->update($user, $request->except('password'));
            }
        }
        else {
            $this->create($request->all());
        }

        return $user;
    }
}
