<?php

namespace App\Http\Controllers\Dashboard\RolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view role');
        try {
            // Fetch the top two roles
            $adminRoles = Role::whereIn('name', ['super-admin', 'admin'])->get();

            // Get the remaining roles
            $allRoles = Role::get();

            $permissions = Permission::get();
            return view('dashboard.role-permission.role.index', compact('adminRoles','allRoles','permissions'));
        } catch (\Throwable $th) {
            //throw $th;
            Log::error("Roles Index Failed:" . $th->getMessage());
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create role');
        $validate = Validator::make($request->all(), [
            'role_name' => 'required|string|max:255|unique:roles,name',
            'permission' => 'nullable|array',
            'permission.*' => 'exists:permissions,name',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput($request->all())->with('error', 'Validation Error!');
        }

        try {
            DB::beginTransaction();
            $slug = str_replace(' ', '-', strtolower($request->role_name));
            $role = new Role();
            $role->name = $slug;
            $role->save();

            if($request->permission)
            {
                $role->syncPermissions($request->permission);
            }

            DB::commit();
            return redirect()->route('dashboard.roles.index')->with('success', 'Role created successfully');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            Log::error("Roles store Failed:" . $th->getMessage());
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update role');
        try {
            $role = Role::findOrFail($id);
            $rolePermissions = DB::table('role_has_permissions')
                ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_has_permissions.role_id', $role->id)
                ->pluck('permissions.name')
                ->all();

            return response()->json([
                'success' => true,
                'role' => $role,
                'rolePermissions' => $rolePermissions
            ]);

        } catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                'success' => false,
                'message' => "Something went wrong! Please try again later"
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $this->authorize('update role');
        $validate = Validator::make($request->all(), [
            'edit_role_name' => 'required|string|max:255|unique:roles,name,'. $id,
            'edit_permission' => 'nullable|array',
            'edit_permission.*' => 'exists:permissions,name',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput($request->all())->with('error', 'Validation Error!');
        }

        try {
            DB::beginTransaction();
            $slug = str_replace(' ', '-', strtolower($request->edit_role_name));
            $role = Role::findOrFail($id);
            $role->name = $slug;
            $role->save();

            if($request->edit_permission)
            {
                $role->syncPermissions($request->edit_permission);
            }

            DB::commit();
            return redirect()->route('dashboard.roles.index')->with('success', 'Role updated successfully');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            Log::error("Roles update Failed:" . $th->getMessage());
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete role');
        try {
            $role = Role::has('users')->find($id);
            if(is_null($role)){
                Role::find($id)->delete();
                return redirect()->route('dashboard.roles.index')->with('success','Role deleted successfully');
            }else{
                return redirect()->route('dashboard.roles.index')->with('error','You cannot delete a role that has users');
            }
        } catch (\Throwable $th) {
            // throw $th;
            Log::error("Roles destroy Failed:" . $th->getMessage());
            return redirect()->back()->with('error', "Something went wrong! Please try again later");
        }
    }
}
