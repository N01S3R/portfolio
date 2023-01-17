<?php

namespace App\Http\Controllers\Admin\Permissions;

use App\DataTables\Admin\PermissionDataTable;
use App\Http\Controllers\Controller;
use App\Models\PermissionCategories;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Response;

class PermissionsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PermissionDataTable $dataTable)
    {
        $categories = PermissionCategories::all();
        return $dataTable->render('admin.permissions.index', compact('categories', $categories));
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
        Permission::Create(
            [
                'name' => $request->name,
                'guard_name' => $request->guard
            ]
        );
        return response()->json(
            [
                'status' => true,
                'message' => 'Permission created!'
            ]

        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $model, Response $request)
    {
        $permission = $model::findOrFail(request('id'));
        return response()->json(
            [
                'status' => true,
                'data' => $permission,
            ]

        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $model, Response $request)
    {
        $role  = $model::findOrFail(request('id'));
        return response()->json(
            [
                'status' => true,
                'data' => $role,
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
    public function update(Permission $model, Request $request)
    {
        $permission = $model::findOrFail($request->id);
        $permission->name = $request->name;
        $permission->guard_name = $request->guard;
        $permission->update();
        return response()->json(
            [
                'status' => true,
                'message' => 'Role edited!',
                'data' => $permission
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
        if (Permission::find((int)$id)->delete()) {
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
