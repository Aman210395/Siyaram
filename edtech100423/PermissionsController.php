<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public $user;
    
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('permission.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any permission !');
        }

        $permissions = Permission::all();
        return view('backend.pages.permissions.index', compact('permissions'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('permission.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any permission !');
        }
        $all_permissions  = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.permissions.create', compact('all_permissions', 'permission_groups'));
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('permission.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any permission !');
        }     
        $role = Permission::create(['name' => $request->name, 'guard_name' => $request->guard_name, 'group_name' => $request->group_name]);
         
        if($role)
        {
            session()->flash('success', 'Permission has been created !!');
            return back();
        }       
       
    }

    public function edit()
    {

    }

    public function show()
    {
        
    }
}