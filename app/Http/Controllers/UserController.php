<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\JsonResponse;
class UserController extends Controller
{
    public function Login()
    {
        return view('Auth.login');
    }
    public function authenticate(Request $request)
    {
        try{
            $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {
            $role = $user->role;

            if ($role == 1) {
                Auth::login($user);
                Session::put('user', $user);
                return redirect('/admin');
            } elseif ($role == 2) {
                Auth::login($user);
                Session::put('user', $user);
                return redirect('/');
            } elseif ($role == 3) {
                Auth::login($user);
                Session::put('user', $user);
                return redirect('/seller/dashboard');
            } elseif ($role == 0){
                return redirect('/waitinglist');
            }
        }

        return back()->withErrors(['message' => 'Invalid credentials.']);
        }
        catch (QueryException $e) {
            return response()->json(['message' => 'Failed to authenticate user'], 500);
        }
    }


    public function Admin()
    {
        return view('Admin.dashboard');
    }
    public function GoogleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function LoginWithGoogle()
    {
        try{
            $user = Socialite::driver('google')->stateless()->user();
        $finduser = User::where('google_id', $user->id)->first();

        if ($finduser) {
            Auth::login($finduser);
            Session::put('user', $user);
            return redirect('/');
        } else {
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email = $user->email;
            $new_user->password = bcrypt('123456');
            $new_user->role = '2';
            $new_user->google_id = $user->id;
            $new_user->save();
            return redirect('/');
        }
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to google login user'], 500);
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
    public function UserRegister()
    {
        return view('Auth.register');
    }
    public function UserRegisterStore(Request $request)
    {
        try{
            $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->google_id = $request->email;
        $user->role = '2';
        $user->save();
        return redirect('/login');
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to register user'], 500);
        }
    }
    public function SellerRegister()
    {
        return view('Auth.sellerregister');
    }
    public function SellerRegisterStore(Request $request)
    {
        try{
            $user = new User();
        $user->name = $request->seller_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->google_id = $request->email;
        $user->role = '0';
        $user->seller_name = $request->seller_name;
        $user->seller_address = $request->seller_address;
        $user->mobile = $request->mobile;
        $user->save();
        return redirect('/waitinglist');
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to register seller'], 500);
        }
    }
    public function Waitlist()
    {
        return view('Auth.waitlist');
    }
}
