<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSave;
use App\Repositories\RoleAndPermissionRepo;
use App\Repositories\UserRepo;
use App\Traits\UserTrait;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Throwable;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    use UserTrait;

    protected $userRepo;
    protected $roleAndPermissionRepo;

    public function __construct(UserRepo $userRepo, RoleAndPermissionRepo $roleAndPermissionRepo) {
        $this->middleware(['permission:create user|edit users|list users|delete users']);
        $this->userRepo = $userRepo;
        $this->roleAndPermissionRepo = $roleAndPermissionRepo;
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
        $roles = Role::all();

        return view('site.admin.user.create-edit', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserSave  $request
     * @return Response
     */
    public function store(UserSave $request)
    {
        try {
            $data = $this->processPassword($request);
            $this->userRepo->create($data);
        }
        catch (Throwable $e) {
            Log::error($e);
            return response()->error();
        }

        return response()->success();
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return Response
     */
    public function show(User $user)
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
        $roles = Role::all();

        return view('site.admin.user.create-edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserSave  $request
     * @param  User  $user
     * @return Response
     */
    public function update(UserSave $request, User $user)
    {
        try {
            $data = $this->processPassword($request);
            $this->userRepo->update($user, $data);
        }
        catch (Throwable $e) {
            Log::error($e);
            return response()->error();
        }

        return response()->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return Response
     */
    public function destroy(User $user)
    {
        try {
            $this->userRepo->delete($user);
        }
        catch (Throwable $e) {
            Log::error($e);
            return response()->error();
        }

        return response()->success();
    }

    /**
     * @param Request $request
     *
     * @return DataTables
     * @throws Exception
     */
    public function list(Request $request) {
        $fName = $request->input('f_name');
        $fEmail = $request->input('f_email');

        $users = $this->userRepo->selectDatatable($fName, $fEmail);

        return DataTables::of($users)
            ->addColumn('actions', function(User $user) {
                $string = '<a href="'.route('user.edit', ['user' => $user->id]).'" class="btn btn-square btn-info mr-1 url_imodal" data-title="Editar Usuario" data-ico="fa fa-user"><i class="ti-pencil"></i></a>';
                $string .= '<a href="'.route('user.destroy', ['user' => $user->id]).'" class="btn btn-square btn-danger text-white btn-delete"><i class="ti-trash"></i></a>';

                return $string;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function roles() {
        return $this->roleAndPermissionRepo->roles();
    }
}
