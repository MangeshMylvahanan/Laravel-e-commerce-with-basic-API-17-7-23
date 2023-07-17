<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;


class RegisterController extends Controller
{
    public function UserRegister(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required',
                ]
            );
            if ($validator->fails()) {
                return response()->json(['message' => 'Validator fails'], 401);
            }
            $data = $request->all();
            $data['role'] = 2;
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);

            $response['token'] = $user->createToken('Adhi');
            $response['name'] = $user->name;

            return response()->json($response, 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to register user'], 500);
        }
    }

    public function Login(Request $request)
    {
        // try {
            $email = $request->input('email');
            $password = $request->input('password');

            $user = User::where('email', $email)->first();

            if ($user && password_verify($password, $user->password)) {
                $role = $user->role;
                $response['token'] = $user->createToken('Adhi');
                $response['name'] = $user->name;

                if ($role == 1) {
                    Auth::login($user);
                    Session::put('user', $user);
                    return response()->json(['message' => 'Logged in as admin', $response], 200);
                } elseif ($role == 2) {
                    Auth::login($user);
                    Session::put('user', $user);
                    return response()->json(['message' => 'Logged in as user', $response], 200);
                } elseif ($role == 3) {
                    Auth::login($user);
                    Session::put('user', $user);
                    return response()->json(['message' => 'Logged in as seller', $response], 200);
                }
            }

            return response()->json(['message' => 'Invalid credentials.'], 401);
        // } catch (\Exception $e) {
        //     return response()->json(['message' => 'Failed to login'], 500);
        // }
    }

    public function registerSeller(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'seller_name' => 'required',
                    'seller_address' => 'required',
                    'email' => 'required|email',
                    'password' => 'required',
                    'mobile' => 'required'
                ]
            );
            if ($validator->fails()) {
                return response()->json(['message' => 'Validator fails'], 400);
            }
            $data = $request->all();
            $data['role'] = 0;
            $data['password'] = Hash::make($data['password']);
            $data['name'] = $request->input('seller_name');

            $user = User::create($data);
            $response['token'] = $user->createToken('Adhi')->plainTextToken;
            $response['name'] = $user->name;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to register seller'], 500);
        }
    }
}
