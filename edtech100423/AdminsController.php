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

class AdminsController extends Controller
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
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }

        // $admins = Admin::all();
        $admins = Admin::where('id', '>', 1)->get();
        return view('backend.pages.admins.index', compact('admins'));
    }

    public function index2(Request $request)
    {
        
        $returnHTML = view('backend.pages.admins.html_data')->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        $roles  = Role::all();
        $services  = Service::all();
        return view('backend.pages.admins.create', compact('roles','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
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
        $admin->role = 2;
        $admin->save();

        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        session()->flash('success', 'Counselor has been created !!');
        return redirect()->route('admin.admins.index');
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

      // Check if email already exsist or not for create 
    public function check_email(Request $request)
    {
        // $request->email_address = $request->email;

        if($request->ajax()){
        $admin = Admin::where('email','=',$request->email)->count();
        if($admin == 0)
        {
            $output = array('success' => true);
            echo json_encode($output);
        }
        }
    }

      // Check if email already exsist or not for edit
    public function email_check(Request $request,$id)
    {
        $id =  intval($id);
        $data = Admin::where('id','=',$id)->first();
        $email = $data->email;
         if($request->ajax())
         {
            $admin = Admin::where('email','=',$request->email)->count();
            
            if($admin == 1 && $request->email == $email)
            {
                $output = array(
                    'success' => true
                );
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
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        // dd($id);

        $admin = Admin::find($id);
        $roles  = Role::all();
        $services  = Service::all();
        return view('backend.pages.admins.edit', compact('admin', 'roles','services'));
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
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        //  dd($request->all());
        // Create New Admin
        $admin = Admin::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins,email,' . $id,
            'password' => 'string|nullable|min:8|confirmed',
            'address' => 'max:255',
            'mobile' => 'sometimes|nullable|digits:10',
            'service' => 'required',
        ]);


        $admin->name = $request->name;
        $admin->email = $request->email;
        // $admin->username = $request->username;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->address = $request->address;
        $admin->mobile = $request->mobile;
        $admin->service = $request->service;
        $admin->save();

        $admin->roles()->detach();
        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        session()->flash('success', 'Counselor has been updated !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // echo "<pre>";print_r($request->all());die;
        if (is_null($this->user) || !$this->user->can('admin.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any admin !');
        }

        $admin = Admin::find($request->id);
        if (!is_null($admin)) {
            $admin->delete();
        }

        // session()->flash('success', 'Counselor has been deleted !!');
        // return back();
        return response()->json('Event updated');

    }
    public function chat(){
         $chats = [];
         $user_id = $this->user->id;
         $allbookinguser = DB::table('bookings')
            ->leftJoin('packages', 'bookings.package_id', '=','packages.id')
            ->leftJoin('admins', 'bookings.consultant_id', '=','admins.id')
            ->leftJoin('users', 'bookings.user_id', '=','users.id')
            ->select('bookings.*','packages.name as packagename','admins.name as adminusername','users.name as username')
            ->where('bookings.consultant_id', '=',$user_id)
            ->groupby('bookings.user_id')
            ->orderBy('bookings.id', 'DESC')->get();
        $userdetails = Auth::guard('admin')->user();
        return view('backend.pages.chat.index', compact('chats','userdetails','allbookinguser'));
  
    }
    public function createChat(Request $request)
    {
        $input = $request->all();
        $message = $input['message'];
        $chat = new Chat([
            'sender_id' => Auth::guard('admin')->user()->id,
            'sender_name' => Auth::guard('admin')->user()->name,
            'receiver_id' => $request->consultant_id,
            'message' => $message
        ]);

        $chat->save();
    }

    public function video()
    {
        $user_id = $this->user->id;
        $allbookinguser = DB::table('bookings')
            ->leftJoin('admins', 'bookings.consultant_id', '=','admins.id')
            ->leftJoin('users', 'bookings.user_id', '=','users.id')
            ->select('bookings.*','admins.name as adminusername','users.*')
            ->where('bookings.counselling_mode','!=','chat')
            ->where('bookings.start_date','=',date('Y-m-d'))
            ->where('bookings.consultant_id', '=',$user_id)
            ->get();
            return view('backend.pages.video.index',compact('allbookinguser'));
        

    }
}
?>