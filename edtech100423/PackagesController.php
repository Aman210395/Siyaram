<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use Razorpay\Api\Api;
use App\Consultant_Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PackagesController extends Controller
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

        $packages = Package::all();
        return view('backend.pages.packages.index', compact('packages'));
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
        
        return view('backend.pages.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        if (is_null($this->user) || !$this->user->can('package.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        // Validation Data

        // dd($request->all());
        $request->validate([
            'name' => 'required|max:50',
            'price' => 'required|numeric|gt:0',
            'package_duration' => 'required|numeric|gt:0',
            'duration_type' => 'required',
            'no_of_counseling' => 'required|numeric|gt:0',
            'counseling_mode' => 'required',
            'status' => 'required',
        ]);

        if($request->input('status')=='Active')
        {
            $status = 1;
        }
        else{
            $status = 0;
        }
        // For Adding & retrieving package from stripe dashboard
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
          );
           $stripe->products->create([
            'name' => $request->name,
           ]);

           $a = $stripe->products->all(['limit' => 1]); 

           $response_json_ecoded= json_encode($a);
           $response_decoded = json_decode($response_json_ecoded, true);
           $stripe_package_id = $response_decoded['data']['0']['id'];

           $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
          );

         $create_price = $stripe->prices->create([
            'unit_amount' => $request->price*100,
            'currency' => 'inr',
            'product' => $stripe_package_id,
            // 'recurring' => array('interval' => 'month', 'interval_count' => $request->package_duration), 
          ]);


        // Save similar package on razorpay dashboard also 
        $price = $request->price * 100;
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));      
        $rozarpayPackage = $api->plan->create(array('period' => strtolower($request->duration_type), 'interval' => $request->package_duration, 'item' => array('name' => $request->name, 'amount' => $price, 'currency' => 'INR')));
        $planId = $rozarpayPackage->id;
        $razorpay_plan_id_response = $api->plan->fetch($planId);
        $saved_plan_id = $razorpay_plan_id_response->id;

        // Create New Admin & also save package info fetched from above in db 
        $package = new Package();
        $package->name = $request->name;
        $package->price = $request->price;
        $package->package_duration = $request->package_duration;
        $package->duration_type = strtolower($request->duration_type);
        $package->no_of_counseling = $request->no_of_counseling;
        $package->counseling_mode = strtolower($request->counseling_mode);        
        $package->counseling_duration = 0;
        $package->status = $status;
        $package->stripe_package_id = $stripe_package_id;
        $package->stripe_price_id = $create_price['id'];
        $package->razorpay_plan_id =  $saved_plan_id;
        $package->save();
        
        session()->flash('success', 'Package has been created !!');
        return redirect()->route('admin.packages.index');
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
        if (is_null($this->user) || !$this->user->can('package.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any role !');
        }

        $package = Package::find($id);
        return view('backend.pages.packages.edit', compact('package'));
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
        $package = Package::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'price' => 'required|numeric|gt:0',
            'package_duration' => 'required|numeric|gt:0',
            'duration_type' => 'required',
            'no_of_counseling' => 'required|numeric|gt:0',
            'counseling_mode' => 'required',
        ]);

        // Update Package        
        $package->name = $request->name;
        $package->price = $request->price;
        $package->package_duration = $request->package_duration;
        $package->duration_type = $request->duration_type;
        $package->no_of_counseling = $request->no_of_counseling;
        $package->counseling_mode = $request->counseling_mode;        
        $package->counseling_duration = 0;//$request->counseling_duration;
        $package->status = $request->status;
        $package->save();

        session()->flash('success', 'Package has been updated !!');
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
        if (is_null($this->user) || !$this->user->can('package.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any role !');
        }

        $package = Package::find($request->id);
        if (!is_null($package)) {
            $package->delete();
        }

        // session()->flash('success', 'Package has been deleted !!');
        // return back();

        return response()->json('Event updated');

    }
}
?>