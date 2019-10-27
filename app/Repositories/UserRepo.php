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
}
