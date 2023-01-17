<?php

namespace App\Http\Controllers\Admin\Roles;

use App\DataTables\Admin\RoleDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-show', ['only' => ['show']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RoleDataTable $dataTable)
    {
        $permission = Permission::get();
        return $dataTable->render('admin.roles.index', compact('permission', $permission));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::Create(
            [
                'name' => $request->add_name,
                'colors' => $request->add_color,
            ]
        );
        $role->syncPermissions($request->input('permission'));

        return response()->json(
            [
                'status' => true,
                'message' => 'User created!'
            ]

        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $model, Request $request)
    {
        $role = Role::findOrFail(request('id'));
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", request('id'))
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return response()->json(
            [
                'data' => $role,
                'rolePermissions' => $rolePermissions
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
        $role  = Role::findOrFail(request('id'));
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", request('id'))
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return response()->json(
            [
                'data' => $role,
                'rolePermissions' => $rolePermissions,
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
    public function update(Request $request,)
    {
        $role = Role::findOrFail(request('id'));
        $role->name = $request->edit_name;
        $role->colors = $request->edit_color;
        $role->update();
        $role->syncPermissions($request->input('permission'));
        $hasPermission = auth()->user()->hasPermissionTo('role-create');
        return response()->json(
            [
                'status' => true,
                'hasPermission' => $hasPermission
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
        if (Role::find((int)$id)->delete()) {
            return response()->json([
                'status' => true,
                'message' => 'Role deleted!',
                'data' => $id
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error deleting!',
            ]);
        }
    }
}
