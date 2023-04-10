<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Booking;
use App\User;
use App\UserRequests;
use App\Package;use App\Consultant_Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::guard('admin')->user()){
            return redirect()->route('admin.login');
        }
        // $bookings = Booking::all();        
        $user_id = isset(Auth::guard('admin')->user()->id) ? Auth::guard('admin')->user()->id : '';
        // print_r($user_id);die;
        $rolename = isset(Auth::guard('admin')->user()->roles[0]->name) ? Auth::guard('admin')->user()->roles[0]->name : '';
        // print_r($rolename);die;
        if($rolename == 'Consultant'){
            $bookings = DB::table('bookings')
            ->leftJoin('packages', 'bookings.package_id', '=','packages.id')
            ->leftJoin('admins', 'bookings.consultant_id', '=','admins.id')
           ->leftJoin('users', 'bookings.user_id', '=','users.id')
            ->select('bookings.*','packages.name as packagename','admins.name as username','users.name as username','admins.name as adminusername')
            ->where('bookings.consultant_id', '=',$user_id)
            ->orderBy('bookings.id', 'DESC')->get();
        }else{
            $bookings = DB::table('bookings')
            ->leftJoin('packages', 'bookings.package_id', '=','packages.id')
            ->leftJoin('admins', 'bookings.consultant_id', '=','admins.id')
            ->leftJoin('users', 'bookings.user_id', '=','users.id')
            ->select('bookings.*','packages.name as packagename','admins.name as adminusername','users.name as username')
            ->orderBy('bookings.id', 'DESC')->get();
        }
        
        // echo "<pre>";print_r($bookings);die;
        
        return view('backend.pages.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookings  = [];//Booking::all();
        $users = User::all();
        $packages = Package::all();
        return view('backend.pages.bookings.create', compact('bookings','users','packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'start_date' => 'required',
            'start_time' => 'required',
            'title' => 'required',
            'user_id' => 'required',
        ]);

        $user_id = $request->user_id;
        $getuserreq = UserRequests::where('user_id','=',$user_id)->first();
        // Create New Admin
        // $end_date = date('Y-m-d', strtotime('+1 day', $request->start_date));
        $end_date = date('Y-m-d', strtotime("+1 day", strtotime($request->start_date)));

        $booking = new Booking();
        $booking->user_id = $user_id;
        $booking->package_id = isset($getuserreq->package_id) ? $getuserreq->package_id :'0';
        $booking->start_date = $request->start_date;
        $booking->start_time = $request->start_time;
        $booking->end_date = $end_date;
        $booking->end_time = $request->start_time;
        $booking->title = $request->title;
        $booking->consultant_id = 0;
        $booking->updated_by = 0;
        $booking->message = $request->message;
        $booking->save();

        session()->flash('success', 'Admin has been Slot Boocked !!');
        return redirect()->route('admin.bookings.index');
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
        $bookings = []; 
        // $booking = Booking::find($id);
        $booking = DB::table('bookings')
            ->leftJoin('packages', 'bookings.package_id', '=','packages.id')
            ->leftJoin('admins', 'bookings.consultant_id', '=','admins.id')
            ->select('bookings.*','packages.name as packagename','admins.name as username')
            ->where('bookings.id', '=',$id)
            ->orderBy('bookings.id', 'DESC')->first();
        $users  = User::all();
        $packages = Package::all();
        return view('backend.pages.bookings.edit', compact('booking', 'users','bookings','packages'));
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
        // Create New Admin
        $booking = Booking::find($id);

        // Validation Data
        $request->validate([
            'start_date' => 'required',
            'start_time' => 'required',
            'title' => 'required',
            'user_id' => 'required',
        ]);

        $user_id = $request->user_id;
        $getuserreq = UserRequests::where('user_id','=',$user_id)->first();
        // Create New Admin
        // $end_date = date('Y-m-d', strtotime('+1 day', $request->start_date));
        $end_date = date('Y-m-d', strtotime("+1 day", strtotime($request->start_date)));

        $booking->user_id = $user_id;
        $booking->package_id = isset($getuserreq->package_id) ? $getuserreq->package_id :'0';
        $booking->start_date = $request->start_date;
        $booking->start_time = $request->start_time;
        $booking->end_date = $end_date;
        $booking->end_time = $request->start_time;
        $booking->title = $request->title;
        $booking->consultant_id = 0;
        $booking->updated_by = 0;
        $booking->message = $request->message;
        $booking->save();
        
        session()->flash('success', 'Booking has been updated !!');
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
        $booking = Booking::find($request->id);
        if (!is_null($booking)) {
            $booking->delete();
        }

        return response()->json('Event updated');
    }

    public function assignConsultant($id)
    {
        $bookings = DB::table('bookings')
        ->leftJoin('users', 'bookings.user_id', '=','users.id')
        ->select('bookings.*','users.name as username')->where('bookings.id','=',$id)
        // ->where('status','!=','cancelled')
        ->first();
       // echo $id;
         //dd($bookings);
        $consaltants = Admin::all();
        $booking = Booking::find($id);
        if($booking){
           
          $consaltants = DB::table('consultant_schedules')
            ->whereDate('start','=', $booking->start_date)
            // ->whereDate('end','=', $booking->end_date)
            ->leftJoin('admins', 'consultant_schedules.user_id', '=','admins.id')
            ->groupby('consultant_schedules.user_id')
            ->distinct()
            ->where('consultant_schedules.user_id','!=',1)
            ->select('admins.name as username','admins.id as consultant_id',
            'consultant_schedules.id as schedules_id','consultant_schedules.start as startdate','consultant_schedules.end as enddate'
            )
            ->get();
            
            
        }
        return view('backend.pages.bookings.assign', compact('bookings','consaltants'));
    }

    public function viewConsultant($id)
    {
        $bookings = DB::table('bookings')
        ->leftJoin('users', 'bookings.user_id', '=','users.id')
        ->select('bookings.*','users.name as username')->where('bookings.id','=',$id)->first();
        $consaltants = Admin::all();
        
        return view('backend.pages.bookings.view-consultant', compact('bookings','consaltants'));
    }

    public function bookingAddConsultant(Request $request)
    {
        // Validation Data
        $request->validate([
            'consaltant' => 'required',
            'booking_id' => 'required',
        ]);

        //add zoom meeting link

        $zoomlink = $this->create_zoom_link($request->start_date,$request->your_query,$request->start_time);

        $update = Booking::where('id','=',$request->booking_id)->update(['status'=>'assigned','consultant_id' => $request->consaltant,'zoom_link' => (isset($zoomlink['url']) ? $zoomlink['url'] :''),'meeting_id' => (isset($zoomlink['meeting_id']) ? $zoomlink['meeting_id'] :'')]);
        
        session()->flash('success', 'User has been assigned consultant !!');
        return redirect()->route('admin.bookings.index');
    }


   public function create_zoom_link($start_date,$query,$s_time) {
		$f_s_datetime = $start_date."T".$s_time;//."Z";

		$filter = array(
            "schedule_for" => "jitendra.tomar@softgrid.in",
		    "password" => "u>5MaBGD1",
		    "agenda" => "User schedule for meeting.",
		    "topic" => "Regarding for you query.",
		    "type" => 2,
		    "start_time" => $f_s_datetime,
		    "duration" => 60,
		    // "timezone" => "Asia/Calcutta"
        );

        $filters = json_encode($filter,true);
        $url = "https://api.zoom.us/v2/users/me/meetings";
        $headers = array(
		    'Content-Type: application/json',
		    'Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6InREVHYxUUdiUTZtQnVlRGhMdTNBdXciLCJleHAiOjE3NjY5MTQyNjAsImlhdCI6MTY3MjIxNDQ5NX0.dloqv0ijbAPVLbn5b7zeColz5rhUYGQR87p8WLY8uGs'
        );
		$curl = curl_init();

		curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$filters,
            CURLOPT_HTTPHEADER => $headers,
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$response = json_decode($response, true);
		// echo"<pre>";print_r($response); die;
		$link['url'] = $response['join_url'];
        $link['meeting_id'] = $response['id'];
		return $link;
	}
    public function delete_meeting_zoom($meeting_id){
        $url = 'https://api.zoom.us/v2/meetings/'.$meeting_id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $result;
    }

}
?>