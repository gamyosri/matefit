<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchActivities(Request $request)
    {
        $activities = \DB::table('activities');

            if ($request->input('title')) {
                $activities->where('title', 'like', '%' . $request->input('title') . '%');
            }

        if ($request->input('title')) {
            $activities ->orwhere('description', 'like', '%' . $request->input('title') . '%');
        };

        if ($request->input('date')) {
            $activities->WhereDate('time', '>=', Carbon::createFromFormat('Y-m-d',$request->input('date')));
        };

        if ($request->input('plz')) {
            $activities->Where('location', 'like','%'. $request->input('plz') . '%');
        };

        return response()->json( $activities->get());
    }

    public function searchTrainer(Request $request){

        $trainers = DB::table('users');
        if ($request->input('discipline')) {
            $trainers->where('dicipline','like','%'.$request->input('discipline').'%');
        }

        if ($request->input('name')) {
        $trainers ->orWhere('name','like','%'. $request->input('name').'%');
        }
        $trainers->where('role','=','trainer');
        return response()->json($trainers->get());
    }

}
