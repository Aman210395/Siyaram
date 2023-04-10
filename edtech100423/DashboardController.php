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

class DashboardController extends Controller
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
        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        }

        $total_users = count(User::select('id')->get());
        $total_counselors = count(Admin::select('id')->get()->skip(1));
        $total_packages = count(Package::select('id')->get());
        $total_bookings = count(Booking::select('id')->get());
        return view('backend.pages.dashboard.index', compact('total_counselors', 'total_users', 'total_packages','total_bookings'));
    }
}
