<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SettingsController extends Controller
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

        $settings = Setting::all();
        return view('backend.pages.settings.index', compact('settings'));
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
        
        return view('backend.pages.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        // dd($request->all());
        // Validation Data
        $request->validate([
            'title' => 'required',
            'setting_key_name' => 'required',
            'setting_key_value' => 'required'
            
        ]);

        // Create Setting
        $setting = new Setting();
        $setting->title = $request->title;
        $setting->setting_key_name = $request->setting_key_name;
        $setting->setting_key_value = $request->setting_key_value;
        $setting->save();
        
        session()->flash('success', 'Setting has been created !!');
        return redirect()->route('admin.settings.index');
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
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any role !');
        }

        $setting = Setting::where('id','=',$id)->first();
        return view('backend.pages.settings.edit', compact('setting'));
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
        $setting = Setting::find($id);

        // Validation Data
        $request->validate([
            'title'=>'required',            
            'setting_key_name' => 'required',
            'setting_key_value' => 'required'
        ]);

        // Update Setting        
        $setting->title = $request->title;
        $setting->setting_key_name = $request->setting_key_name;
        $setting->setting_key_value = $request->setting_key_value;
        $setting->save();

        session()->flash('success', 'Setting has been updated !!');
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
        if (is_null($this->user) || !$this->user->can('role.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any role !');
        }

        $setting = Setting::find($request->id);
        if (!is_null($setting)) {
            $setting->delete();
        }

        return response()->json('Event updated');
    }
}
?>