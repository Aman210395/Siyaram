<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;
use App\Package;
use App\Booking;
use App\Service_explore;

class ExploreServicesController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index(){ 
        //echo "<pre>";print_r($this->user);die;
        // if (is_null($this->user) || !$this->user->can('dashboard.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        // }
        

        $data['request'] = Service_explore::select('service_explore.id','service_explore.user_id','service_explore.email','service_explore.location','service_explore.course_type','service_explore.category','service_explore.duration','users.name as username')->leftJoin('users','users.id','=','service_explore.user_id')->get();

        return view('backend.requestservice.index',$data);

    }
}
