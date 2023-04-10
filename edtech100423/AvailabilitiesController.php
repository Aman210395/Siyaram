<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Consultant_Schedule;
use Carbon\Carbon;

class AvailabilitiesController extends Controller
{
    public function index()
    {
		$user_id = Auth::guard('admin')->user()->id;
        $events = array();
        $id = request()->user_id;
        if(! request()->user_id)
        {
        $bookings = Consultant_Schedule::where('user_id','=',$user_id)->get();
        }
        else{
        $bookings = Consultant_Schedule::where('user_id','=',$id)->get();
        }
        foreach($bookings as $booking) {
            $now = date_create($booking->start); 
            $your_date =date_create($booking->end);
            $interval = date_diff($now, $your_date);
            $diff= $interval->format('%a') + 1;
            for ($i=0; $i<$diff; $i++) { 
                if($i == 0){
                    $start= $booking->start.' '.$booking->start_time;
                    $end = $booking->start.' '.$booking->end_time;
                }else{
                    $newstart= date('Y-m-d', strtotime($booking->start . '+'.$i.' days'));
                    $start= $newstart.' '.$booking->start_time;
                    $end= $newstart.' '.$booking->end_time;   
                }
                 $events[] = [
                    'id'   => $booking->id,
                    'title' => $booking->title,
                    'start' => $start,
                    'end' => $end,
                ];               
            }
                        
        }
        $data = DB::table('admins')
          ->select('admins.name','admins.id')
          ->where('id', '>',1)
          ->get();   
        return view('backend.pages.availability.create', ['events' => $events],compact('data'));
    }
    public function store(Request $request)
    {
            $request->validate([
                'title' => 'required|string',
                'start' => 'required',
                'end' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
            ]);
    
            $booking = Consultant_Schedule::create([
                'title' => $request->title,
                'start' => $request->start,
                'end' => $request->end,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'user_id' => $request->user_id,
                'added_by' => $request->added_by
            ]);
    
            return response()->json([
                'id' => $booking->id,
                'start' => $booking->start,
                'end' => $booking->end,
                'start_time' => $booking->start_time,
                'end_time' => $booking->end_time,
                'title' => $booking->title,
            ]);
            
    }
    public function update(Request $request ,$id)
    {
         $picked_date  = $request->picked_event_date;
         $newDate = date("Y-m-d", strtotime($picked_date));
         $id = intval($request->id);
         $res = Consultant_Schedule::where('id','=',$id)->first();
         $title = $res->title;
         $start = $res->start;
         $end = $res->end;
         $start_time = $res->start_time;
         $end_time = $res->end_time;
         $user_id = $res->user_id;
         $added_by = $res->added_by;


         $dateBefore = date('Y-m-d' , strtotime('-1 day',strtotime($newDate))); 
         $dateAfter = date('Y-m-d' , strtotime('+1 day',strtotime($newDate))); 


         if($dateBefore >= $start){

            $booking = Consultant_Schedule::create([
                'title' => $title,
                'start' => $start,
                'end' => $dateBefore,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'user_id' => $user_id,
                'added_by' => $added_by
            ]);

         }

         if($dateAfter <= $end){

            $booking = Consultant_Schedule::create([
                'title' => $title,
                'start' => $dateAfter,
                'end' => $end,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'user_id' => $user_id,
                'added_by' => $added_by
            ]);
         }

         $booking = Consultant_Schedule::find($id);
         if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
         $booking->update([
            'start' => $request->start,
            'end' => $request->end,
        ]);
        //  return response()->json('Event updated');
        return $id;
         

    }


     public function updateOnResize(Request $request ,$id)
    {

        $id = intval($request->id);
        $res = Consultant_Schedule::where('id','=',$id)->first();

         
         $start = explode(" ",$request->start);
         $end = explode(" ",$request->end);

        //  dd($end);

        //  $start[0] & $end[0] is date which is resized
        //  $start[1] is starting time 10.00
        //  $end[1] is ending time at which event is left 

         $resize_date = $start[0];
         $starting_time = $start[1];
         $ending_time = $end[1];
       
         $booking =  Consultant_Schedule::create([
                  'title' => $res->title,
                  'start' => $start[0],
                  'end' => $end[0],
                  'start_time' => $start[1],
                  'end_time' => $end[1],
                  'user_id' => $res->user_id,
                  'added_by' => $res->added_by
         ]);     

         $dateBefore = date('Y-m-d' , strtotime('-1 day',strtotime($start[0]))); 
         $dateAfter = date('Y-m-d' , strtotime('+1 day',strtotime($start[0]))); 


         if($dateBefore >= $res->start){
              
           $booking =  Consultant_Schedule::create([
                  'title' => $res->title,
                  'start' => $res->start,
                  'end' => $dateBefore,
                  'start_time' => $res->start_time,
                  'end_time' => $res->end_time,
                  'user_id' => $res->user_id,
                  'added_by' => $res->added_by
         ]);     

         }

         if($dateAfter <= $res->end){

            $booking =  Consultant_Schedule::create([
                'title' => $res->title,
                'start' => $dateAfter,
                'end' => $res->end,
                'start_time' => $res->start_time,
                'end_time' => $res->end_time,
                'user_id' => $res->user_id,
                'added_by' => $res->added_by
            ]);
         }
        
        $booking = Consultant_Schedule::find($id);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->delete();
        // return response()->json('Event updated');
        return $id;
    }

    public function destroy(Request $request,$id)
    {

        $id = intval($request->id);

        $res = Consultant_Schedule::where('id','=',$id)->first();

        $alt_date = date('Y-m-d', strtotime($request->date));
        
        $dateBefore = date('Y-m-d' , strtotime('-1 day',strtotime($alt_date))); 
        $dateAfter = date('Y-m-d' , strtotime('+1 day',strtotime($alt_date))); 


       
            if($dateBefore >= $res->start){

                $booking = Consultant_Schedule::create([
                    'title' => $res->title,
                    'start' => $res->start,
                    'end' => $dateBefore,
                    'start_time' => $res->start_time,
                    'end_time' => $res->end_time,
                    'user_id' => $res->user_id,
                    'added_by' => $res->added_by
                ]);
        }
       
            if($dateAfter <= $res->end){

                $booking = Consultant_Schedule::create([
                    'title' => $res->title,
                    'start' => $dateAfter,
                    'end' => $res->end,
                    'start_time' => $res->start_time,
                    'end_time' => $res->end_time,
                    'user_id' => $res->user_id,
                    'added_by' => $res->added_by
                ]);
        }
        
        $booking = Consultant_Schedule::find($id);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->delete();
        return $id;
    }
}

?>