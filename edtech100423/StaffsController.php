<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Service;
use App\Chat;

class StaffsController extends Controller
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
        if (is_null($this->user) || !$this->user->can('staff.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any staff !');
        }

        $staffs = Admin::where('id', '>', 1)->get();
        return view('backend.pages.staffs.index', compact('staffs'));
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('staff.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any staff !');
        }

        $roles  = Role::all();
        $services  = Service::all();
        return view('backend.pages.staffs.create', compact('roles','services'));
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('staff.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any staff !');
        }
        // $request->email_address = $request->email;
        // dd($request->all());
        
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins',
            'password' => 'required|min:6|confirmed',
            'address' => 'max:255',
            'mobile' => 'sometimes|nullable|digits:10',
            'service' => 'required',
        ]);
       
        // Create New Admin
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->address = $request->address;
        $admin->mobile = $request->mobile;
        $admin->service = $request->service;
        $admin->role = 3;
        $admin->save();

        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        session()->flash('success', 'Staff has been created !!');
        return redirect()->route('admin.staffs.create');
    }

    public function edit()
    {

    }

    public function show()
    {
        
    }

    public function check_email(Request $request)
    {
            $data = Admin::where('id','=',$request->id)->first();
            if($request->ajax())
            {
                $admin = Admin::where('email','=',$request->email)->count();
                if($admin == 0)
                    {
                    $output = array(
                    'success' => true
                    );
    
                    echo json_encode($output);
                    }
            }           
                 
    }

    
}