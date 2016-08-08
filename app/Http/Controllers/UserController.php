<?php
/**
 * Created by PhpStorm.
 * User: muhammadkh4n
 * Date: 8/5/16
 * Time: 8:03 PM
 */

namespace App\Http\Controllers;


use App\User;
use App\UserLoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUsers(Request $req) {
        if (!$req->user()->admin)
            return redirect()->route('admin.dashboard');
        $users = User::all();

        return view('admin.dashboard-users', ['users' => $users]);
    }

    public function promoteUser($id) {
        $user = User::find($id);
        $user->admin = true;
        $user->save();

        return redirect()->back()->with(['success' => 'User #' . $user->id . ' => ' . $user->name . ' Set to Admin']);
    }

    public function demoteUser(Request $req, $id) {
        if ($req->user()->id == $id) {
            return redirect()->back()->with(['fail' => 'You can\'t demote Yourself']);
        }
        $user = User::find($id);
        $user->admin = false;
        $user->save();

        return redirect()->back()->with(['success' => 'User #' . $user->id . ' => ' . $user->name . ' Set to Normal User']);
    }

    public function getRegister(Request $req) {
        if ($req->ajax()) {
            $html = view('includes.modals.register')->render();
            return response()->json(['html' => $html]);
        }

        return redirect()->back();
    }

    public function postRegister(Request $req) {
        if ($req->ajax()) {
            $this->validate($req, [
                'name' => 'bail|required|regex:/^[\pL\s]+$/u',
                'email' => 'bail|required|email|unique:users',
                'password' => 'required',
                'confirm' => 'required|same:password'
            ]);

            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = bcrypt($req->password);
            $user->save();

            return response('Registration Successful!', 200);
        }

        return redirect()->back();
    }

    public function postLogin(Request $req) {
        if ($req->ajax()) {
            $this->validate($req, [
                'email' => 'bail|required|email',
                'password' => 'required|max:60'
            ]);

            $remember = $req['remember'] == 'true' ? true : false;

            if (!auth()->attempt(['email' => $req->email, 'password' => $req->password], $remember)) {
                return response('Email or password incorrect', 401);
            }

            $user = User::where('email', $req->email)->first();
            $userLog = new UserLoginLog();
            $user->user_logs()->save($userLog);

            return response('Login Successful!', 200);
        }

        return redirect()->back();
    }

    public function getLogout() {
        Auth::logout();

        return redirect()->intended(route('home'));
    }
}