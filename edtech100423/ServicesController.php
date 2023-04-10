<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ServicesController extends Controller
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
        if (is_null($this->user) || !$this->user->can('role.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any role !');
        }

        $services = Service::all();
        return view('backend.pages.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any role !');
        }
        
        return view('backend.pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('service.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'serv_icon' => 'max:10000|mimes:jpg,jpeg,png',
            'status' => 'required',
        ]);

        // if($request->input('status') == 'Active')
        // {
        //     $status = 1;
        // }
        // else{
        //     $status = 0;
        // }

        // Create New Service
        $service = new Service();

        if($request->file('serv_icon')){
            $file= $request->file('serv_icon');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/backend/assets/uploads'), $filename);
            $data['serv_icon'] = $filename;         
         }

        $service->name = $request->name;
        if($request->file('serv_icon'))
        {
        $service->serv_icon = $data['serv_icon'];
        }
        
        $service->status = $request->status;
        $service->save();
        
        session()->flash('success', 'Service has been created !!');
        return redirect()->route('admin.services.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('service.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any role !');
        }

        $service = Service::find($id);
        return view('backend.pages.services.edit', compact('service'));
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
        // Create New User
        // $service = Service::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'serv_icon' => 'max:10000|mimes:jpg,jpeg,png',
        ]);

        // Update Service
        if($request->file('serv_icon')){
            $file = $request->file('serv_icon');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/backend/assets/uploads'), $filename);
            $data['serv_icon'] = $filename;
        }
        // $service->name = $request->name;        
        // $service->status = $request->status;
        // $service->save();
        // $update = Service::where('id','=',$id)->update(['name' => $request->name, 'status' =>  $request->status, 'serv_icon' =>  isset($data['serv_icon'])]);
        $update = Service::where('id','=',$id)->update(['name' => $request->name, 'status' =>  $request->status ]);

        if($request->serv_icon)
        {
           $img_update = Service::where('id','=',$id)->update(['serv_icon' => $data['serv_icon']]);
        }        
        session()->flash('success', 'Service has been updated !!');
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
        if (is_null($this->user) || !$this->user->can('service.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any role !');
        }

        $service = Service::find($request->id);
        if (!is_null($service)) {
            $service->delete();
        }

        // session()->flash('success', 'Service has been deleted !!');
        // return back();

        return response()->json('Event updated');

    }
}
