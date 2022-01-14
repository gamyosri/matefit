<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=\Auth::user();
        $query=Booking::where('mate_id','=',$user->id);
            if ($user->role =='trainer'){
                $query=Booking::where('trainer_id','=',$user->id);
            }

        $bookings = $query->get();
        return response()->json($bookings);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trainer_id'=>'required|integer',
            'mate_id'=>'required|integer',
            'title'=>'required|string',
            'description'=>'required|string',
            'location'=>'required|string',
            'time' => 'required|date_format:Y-m-d H:i:s',
            'maxppl'=>'required|integer',
        ]);

        $price = User::where('id','=',$validatedData['trainer_id'])->pluck('price');

        Booking::create([
            'trainer_id'=>$validatedData['trainer_id'],
            'mate_id'=>$validatedData['mate_id'],
            'title'=>$validatedData['title'],
            'description'=>$validatedData['description'],
            'location'=>$validatedData['location'],
            'maxppl'=>$validatedData['maxppl'],
            'time'=>$validatedData['time'],
            'price'=>$price->first(),
        ]);


        return response()->json(['message' => 'booking request successfully sent']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        return response()->json($booking);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'trainer_id'=>'required|integer',
            'mate_id'=>'required|integer',
            'title'=>'required|string',
            'description'=>'required|string',
            'location'=>'required|string',
            'time' => 'required|date_format:Y-m-d H:i:s',
            'maxppl'=>'required|integer',
        ]);
        $booking = Booking::find($id);
        $booking->update([
            'trainer_id'=>$validatedData['trainer_id'],
            'mate_id'=>$validatedData['trainer_id'],
            'title'=>$validatedData['title'],
            'description'=>$validatedData['description'],
            'location'=>$validatedData['location'],
            'time' => $validatedData['time'],
            'maxppl'=>$validatedData['maxppl'],
        ]);
        $booking->sacve();
        return response('booking request updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::destroy($id);
        return response('booking deleted with success', 200);
    }

    public function accept($id){

        $booking=Booking::find($id);
        $mate = User::find($booking->mate_id);
        $trainer = User::find($booking->trainer_id);
        if ($mate->credit < $trainer->price){
            return response('you dont have enough credit', 200);
        }
        $mate->credit = $mate->credit - $trainer->price;
        $trainer->credit = $trainer->credit +  $trainer->price;
        $mate->save();
        $trainer->save();
            $booking->update([
                'status' => 'accepted',
            ]);

        return response('booking accepted with success', 200);
    }

    public function decline($id){
        $booking=Booking::find($id);
        $booking->update([
            'status' => 'declined',
        ]);
        return response('booking declined with success', 200);
    }

    public function PendingTrainerBookings(){

        $filtered = collect();
        $trainer_id=\Auth::user()->id;

        $bookings = Booking::where('trainer_id','=',$trainer_id)
                ->where('status','=','pending')
                ->orWhere('status','=','accepted')
                ->get();

        foreach ($bookings as $activity){
            if(Carbon::parse($activity->time) > Carbon::yesterday()) {
                $filtered->push($activity);
            }
        };
        return response()->json($filtered);
    }

    public function PendingMateBookings(){
        $user=\Auth::user();
        $bookings=Booking::where('mate_id','=',$user->id)
            ->where('status','=','pending')
            ->orWhere('status','=','accepted')
            ->get();
        return response()->json($bookings);
    }

    public function getAcceptedBookings(){
        $user=\Auth::user();

        $filtered = collect();
        $bookings=Booking::where('status','=','accepted');

        if ($user->role == 'mate'){
        $bookings->where('mate_id','=',$user->id);
        }

        if ($user->role == 'trainer'){
        $bookings->where('trainer_id','=',$user->id);
        }

        $acceptedBookings = $bookings->get();

        foreach ($acceptedBookings as $booking){
                 if(Carbon::parse($booking->time) > Carbon::yesterday()) {
                     $filtered->push($booking);
                 }
             };
        return response()->json($filtered);
    }
}
