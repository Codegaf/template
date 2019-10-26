<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSave;
use App\Repositories\UserRepo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo) {
        $this->userRepo = $userRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('site.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('site.admin.user.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserSave  $request
     * @return Response
     */
    public function store(UserSave $request)
    {
        $this->userRepo->store($request);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return Response
     */
    public function edit(User $user)
    {
        return view('site.admin.user.create-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function list() {
        $users = $this->userRepo->selectDatatable();

        return DataTables::of($users)
            ->addColumn('actions', function(User $user) {
                $string = '<a href="'.route('user.edit', ['user' => $user->id]).'" class="btn btn-square btn-info mr-1 url_imodal" data-title="Editar Usuario" data-ico="fa fa-user"><i class="ti-pencil"></i></a>';
                $string .= '<a class="btn btn-square btn-danger text-white"><i class="ti-trash"></i></a>';

                return $string;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
