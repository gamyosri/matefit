<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use mysql_xdevapi\Exception;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'time' => 'required|date_format:Y-m-d H:i:s',
            'price' => 'integer',
            'maxppl' => 'required|integer',
        ]);


        $user->role == 'trainer' ? $participants = [] : $participants = [$user->id];

        $activity = new Activity([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'location' => $validatedData['location'],
            'time' => $validatedData['time'],
            'type' => $user->role == 'trainer' ? 'event' : 'activity',
            'price' => $user->role == 'trainer' ? $validatedData['price'] : 0,
            'maxppl' => $validatedData['maxppl'],
            'participants' => json_encode($participants)
        ]);

        $activity->user()->associate($user->id);
        $user->postedActivities()->save($activity);
        return response()->json(['message' => 'saved success']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::find($id);
        $activity->participants = json_decode($activity->participants);
        $users = [];
        foreach ($activity->participants as $participant) {
            $user = User::find($participant);
            array_push($users, $user->toArray());
        }
        $activity->users = $users;
        return response()->json($activity);
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
        $user = \Auth::user();
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'time' => 'required|date_format:Y-m-d H:i:s',
            'price' => 'integer',
            'maxppl' => 'required|integer',
        ]);

        $activity = Activity::find($id);

        $activity->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'location' => $validatedData['location'],
            'time' => $validatedData['time'],
            'type' => $user->role == 'trainer' ? 'event' : 'activity',
            'price' => $user->role == 'trainer' ? $validatedData['price'] : 0,
            'maxppl' => $validatedData['maxppl']
        ]);

        $activity->user()->associate($user->id);
        $user->postedActivities()->save($activity);
        return response()->json(['message' => 'updated with success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::destroy($id);
        return response()->json(['message' => 'deleted with success']);
    }

    public function participate($id)
    {
        $mate = \Auth::user();
        $activity = Activity::find($id);
        $participants = json_decode($activity->participants);

        if (in_array($mate->id, $participants)) {
            return response()->json(['message' => 'you cannot participate twice']);
        }

        if (count($participants) >= $activity->maxppl) {
            return response()->json(['message' => 'activity reached maximum participants']);
        }

        if ($activity->type == 'event') {
            $mate->credit = $mate->credit - $activity->price;
            $mate->save();
            $trainer = User::find($activity->user)->first();
            $trainer->credit = $trainer->credit + $activity->price;
            $trainer->save();
        }

        array_push($participants, $mate->id);
        $activity->participants = json_encode($participants);
        $activity->save();
        return response()->json(['message' => 'successfull participation']);
    }

    public function cancel($id)
    {
        $user = \Auth::user();
        $activity = Activity::find($id);
        $participants = json_decode($activity->participants);

        if (in_array($user->id, $participants)) {
            $participants = array_diff($participants, [$user->id]);
        }
        if ($user->id == $activity->user_id) {
            return response()->json(['message' => 'you cannot leave your activity']);
        }


        $activity->participants = json_encode(array_values($participants));
        $activity->save();
        return response()->json(['message' => 'cancelation successfull']);
    }

    public function myActivities(Request $request)
    {
        $filtered = collect();
        $user = \Auth::user();

        $activities = Activity::where('time','>=',Carbon::today())
            ->where('participants', 'like', '%[' . $user->id . ']%')
            ->orWhere('participants', 'like', '%[' . $user->id . ',%')
            ->orWhere('participants', 'like', '%[' . $user->id . ',%')
            ->orWhere('participants','like','%,'.$user->id.',%')
            ->orWhere('participants','like','%,'.$user->id.']%')
            ->orWhere('user_id','=',$user->id)->get();

         foreach ($activities as $activity){
            if(Carbon::parse($activity->time) > Carbon::yesterday()) {
                $filtered->push($activity);
            }
        };
        return response()->json($filtered);
    }
}
