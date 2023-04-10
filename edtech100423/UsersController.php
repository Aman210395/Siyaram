<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use App\UserRequests;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        // $users = User::leftJoin('user_requests', 'users.id', '=', 'user_requests.user_id')->get();
        $users = DB::table('users')
        ->leftJoin('user_requests', 'users.id', '=','user_requests.user_id')
        ->leftJoin('packages', 'user_requests.package_id', '=','packages.id')
        ->select('users.*', 'user_requests.query', 'packages.name as packagename')->orderBy('users.id', 'DESC')->get();
        return view('backend.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages  = Package::all();
        return view('backend.pages.users.create', compact('packages'));
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
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'mobile' => 'required|digits:10',
            'package' => 'required',
            'address' => 'required',
            'your_query' => 'required',
            'schedule' => 'required',
            'time' => 'required',   
        ]);

        // Create New User
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->mobile = $request->mobile;
        // $user->package = $request->package;
        $user->address = $request->address;
        // $user->your_query = $request->your_query;
        // $user->schedule = $request->schedule;
        $user->save();
        $id = $user->id;
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $zoomlink = $this->create_zoom_link($request->schedule,$request->your_query,$request->time);

        $userreq = new UserRequests;
        $userreq->package_id = $request->get('package');
        $userreq->query = $request->get('your_query');;
        $userreq->schedule_date = $request->get('schedule');
        $userreq->schedule_time = $request->get('time');
        $userreq->zoom_link = isset($zoomlink['url']) ? $zoomlink['url'] :'';
        $userreq->meeting_id = isset($zoomlink['meeting_id']) ? $zoomlink['meeting_id'] :'';
        $getuserreq = UserRequests::where('user_id','=',$id)->first();
        if(isset($getuserreq->id)){
            if(isset($zoomlink['meeting_id'])){
                $this->delete_meeting_zoom($zoomlink['meeting_id']);
            }
            $userreq->exists = true;
            $userreq->id = $getuserreq->id; //already exists in database.
        }else{
            $userreq->user_id = $id;
        }
        $user_request_id = $userreq->save();

        // Mail::to($request->email)->send(new WelcomeMail($user));

        session()->flash('success', 'User has been created !!');
        return redirect()->route('admin.users.index');
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
        $user = User::find($id);
        $userrequest = UserRequests::where('user_id','=',$id)->first();        
        $packages  = Package::all();
        return view('backend.pages.users.edit', compact('user', 'packages','userrequest'));
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

        // dd($request->all());
        // Create New User
        $user = User::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email,' . $id,
            // 'password' => 'nullable|min:6|confirmed',
            'mobile' => 'sometimes|nullable|digits:10',
            'package' => 'required',
            'address' => 'max:255',
            'your_query' => 'required',
            'schedule' => 'required',
        ]);

        $zoomlink = $this->create_zoom_link($request->schedule,$request->your_query,$request->time);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->mobile = $request->mobile;
        // $user->package = $request->package;
        $user->address = $request->address;
        // $user->your_query = $request->your_query;
        // $user->schedule = $request->schedule;
        // $user->zoom_link = $zoomlink;
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        
        $userreq = new UserRequests;
        $userreq->package_id = $request->get('package');
        $userreq->query = $request->get('your_query');;
        $userreq->schedule_date = $request->get('schedule');
        $userreq->schedule_time = $request->get('time');
        $userreq->zoom_link = isset($zoomlink['url']) ? $zoomlink['url'] :'';
        $userreq->meeting_id = isset($zoomlink['meeting_id']) ? $zoomlink['meeting_id'] :'';
        $getuserreq = UserRequests::where('user_id','=',$id)->first();
        if(isset($getuserreq->id)){
            if(isset($zoomlink['meeting_id'])){
                $this->delete_meeting_zoom($zoomlink['meeting_id']);
            }
            $userreq->exists = true;
            $userreq->id = $getuserreq->id; //already exists in database.
        }else{
            $userreq->user_id = $id;
        }
        $user_request_id = $userreq->save();

        // Mail::to($request->email)->send(new WelcomeMail($user));

        session()->flash('success', 'User has been updated !!');
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
        $user = User::find($request->id);
        if (!is_null($user)) {
            $user->delete();
        }
        return response()->json('Event updated');
    }

    public function zoom_callback(Request $request){
        print_r($request->all());
    }

    function create_zoom_link($start_date,$query,$s_time) {
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