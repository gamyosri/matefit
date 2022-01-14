<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{

    public function join(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'lastname'=> 'required|string',
            'bDate'=> 'required|string',
            'email' => 'required|string|email|unique:users',
            'gender'=>['required', Rule::in('male','female','other')],
            'role'=>['required', Rule::in('mate','trainer')],
            'dicipline'=>'required|string',
            'price'=> 'integer',
            'password' => 'required|string|min:8',
            'password2' => 'required|string|min:8|same:password',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'bDate' => $validatedData['bDate'],
            'role' => $validatedData['role'],
            'gender' => $validatedData['gender'],
            'price'=> $validatedData['role'] == 'trainer' ? $validatedData['price'] : 0,
            'dicipline'=> $validatedData['dicipline'] ,
            'email' => $validatedData['email'],
            'password' => \Hash::make($validatedData['password']),
        ]);

        $user->token = $user->createToken('auth_token')->plainTextToken;

        return response()->json($user);
    }

    public function login(Request $request)
    {
        if (!\Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $user->token = $user->createToken('auth_token')->plainTextToken;
        return response()->json( $user);
    }

    public function profile($id)
    {
           $user = User::find($id);
           $user->bDate = Carbon::createFromFormat('d.m.Y',$user->bDate);
           return response()->json($user);
    }

}

