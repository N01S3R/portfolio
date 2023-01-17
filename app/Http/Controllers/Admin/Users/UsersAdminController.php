<?php

namespace App\Http\Controllers\Admin\Users;

use App\DataTables\Admin\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Mail\Admin\SendUserPass;
use App\Models\User;
use Spatie\Permission\Models\Role;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UsersAdminController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        $roles = Role::all();
        return $dataTable->render('admin.users.index', compact('roles', $roles));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        // dd(Storage::putFile('public/avatars', $request->file('avatar')));
        $avatar = Storage::putFile('public/avatars', $request->file('avatar'));
        $password = $this->RandomString(8);
        // Users Details
        $user = User::Create(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'user_name' => $request->user_name,
                'email' => $request->email,
                'avatar' => substr($avatar, 15),
                'password' => Hash::make($password),
            ]
        );
        $user->syncRoles([$request->user_rank]);
        $details = [
            'title' => 'Nowe hasło dla konta',
            'body' => 'Dane do twojego konta',
            'username' => $request->user_name,
            'first_name' => $request->first_name,
            'password' => $password
        ];
        Mail::to($request->email)->send(new SendUserPass($details));
        return response()->json(
            [
                'status' => true,
                'message' => 'User created!'
            ],
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $model, Response $request)
    {
        $user = $model::findOrFail(request('id'));

        // $where = array('id' => $request->id);
        // $user  = request('id');
        return response()->json(
            [
                'status' => true,
                'data' => $user,
                'userRole' => $user->roles->pluck('name'),
            ]

        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $model, Response $request)
    {
        $user = User::findOrFail(request('id'));

        // $where = array('id' => $request->id);
        // $user  = request('id');
        return response()->json(
            [
                'status' => true,
                'data' => $user,
                'userRole' => $user->roles->pluck('name'),
            ]

        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $model, Request $request)
    {

        $user = $model::findOrFail($request->id);
        if (!empty($request->file('edit_avatar'))) {
            if (Storage::exists('public/avatars/' . $user->avatar)) {
                if ($user->avatar != 'default.png') {
                    Storage::delete('public/avatars/' . $user->avatar);
                }
                $user->avatar = substr(Storage::putFile('public/avatars', $request->file('edit_avatar')), 15);
            }
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->syncRoles([$request->user_rank]);
        $user->update();

        return response()->json(
            [
                'status' => true,
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (Storage::exists('public/avatars/' . $user->avatar)) {
            Storage::delete('public/avatars/' . $user->avatar);
        }
        if ($user->delete()) {

            return response()->json([
                'status' => true,
                'message' => 'User deleted!',
                'data' => $id
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error deleting!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkEmail(Request $request)
    {
        if ($request->email) {
            if (User::where('email', '=', $request->email)->count()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email exists !'
                ]);
            } else {
                return response()->json([
                    'status' => "emailTrue",
                    'message' => 'Email avalable !'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User Name exists !'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkUserName(Request $request)
    {
        if (!empty($request->user_name)) {
            if (User::where('user_name', '=', $request->user_name)->count()) {
                return response()->json([
                    'status' => false,
                    'message' => 'User Name exists !'
                ]);
            } else {
                return response()->json([
                    'status' => "userNameTrue",
                    'message' => 'User Name avalable !'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User Name exists !'
            ]);
        }
    }

    function RandomString()
    {
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);

        return $password;
    }
}
