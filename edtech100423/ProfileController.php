<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Setting;use App\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ProfileController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }
        $id = Auth::guard('admin')->user()->id;
        $admin = Admin::find($id);
        $roles = Role::all();
        $services  = Service::all();
        return view('backend.pages.profile.edit', compact('admin','roles','services'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   // Check if email already exsist or not
   public function check_email(Request $request,$id)
   {
       $id = intval($id);
       $data = Admin::where('id','=',$id)->first();
       $email = $data->email;
       if($request->ajax()){
       $admin = Admin::where('email','=',$request->email)->count();
       if($admin == 1 && $request->email == $email)
       {
           $output = array('success' => true);
           echo json_encode($output);
       }
       }
   }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        print_r($id); die;
        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $admin = Admin::find($id);
        return view('backend.pages.profile.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }
        // Create New Admin
        $admin = Admin::find($id);
        
        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins,email,' . $id,      
            'password' => 'string|nullable|min:8|confirmed',
            'address' => 'max:255',
            'mobile' => 'sometimes|nullable|digits:10',
        ]);


        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->address = $request->address;
        $admin->mobile = $request->mobile;
        $admin->service = $request->service;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        // $admin->password = Hash::make($request->password);
        $admin->save();

        session()->flash('success', 'Profile has been updated !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
?>