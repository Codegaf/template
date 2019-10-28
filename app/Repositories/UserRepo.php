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

    public function selectDatatable($fName, $fEmail) {
        $query = $this->getModel()
            ->select('users.*');

        if (!is_null($fName)) {
            $query->where('name', 'LIKE', '%'.$fName.'%');
        }
        if (!is_null($fEmail)) {
            $query->where('email', 'LIKE', '%'.$fEmail.'%');
        }

        return $query;
    }
}
