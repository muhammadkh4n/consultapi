<?php

namespace App\Http\Controllers;

use App\University;
use App\UniversityInfo;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Monarobase\CountryList\CountryListFacade;

class DashboardController extends Controller
{
    //----------------------------------------------------------------
    //             All USERS
    //----------------------------------------------------------------

    /*
     * Gets User Profile view (Main Dashboard Page)
     */
    public function getDashboard(Request $req) {
        $user = $req->user();
        return view('user.dashboard', ['user' => $user]);
    }


    //----------------------------------------------------------------
    //            ADMIN USERS
    //----------------------------------------------------------------

    /*
     * Gets University list in the dashboard.
     */
    public function getUniversityList(Request $req) {

        $countries = CountryListFacade::getList('en', 'php', 'cldr');
        $universities = University::orderBy('created_at', 'desc')->get();

        return view('admin.uni_list', ['universities' => $universities, 'countries' => $countries]);
    }

    /*
     * Add University to the Database. in dashboard view.
     */
    public function addUniversity(Request $req) {

        $this->validate($req, [
            'name' => 'required|unique:universities|regex:/^[\pL\s]+$/u',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            'established' => 'required|digits:4',
            'rank' => 'required|numeric',
            'population' => 'required|numeric',
            'intpopulation' => 'required|numeric|max:' . $req['population'],
            'pkpopulation' => 'required|numeric|max:' . $req['population'],
            'extracur' => 'required',
        ]);

        $university = new University();
        $university->name = $req['name'];
        $university->address = $req['address'];
        $university->city = $req['city'];
        $university->country = $req['country'];
        $university->email = $req['email'];
        $university->website = $req['website'];
        $university->save();

        $university_info = new UniversityInfo();
        $university_info->established = $req['established'];
        $university_info->rank = $req['rank'];
        $university_info->population = $req['population'];
        $university_info->intpopulation = $req['intpopulation'];
        $university_info->pkpopulation = $req['pkpopulation'];
        $university_info->extracur = $req['extracur'];

        $university->university_info()->save($university_info);

        return redirect()->back()->with(['success' => 'University Added Successfully!']);
    }

    /*
     * Gets All the Users that are signed up
     */
    public function getUserList(Request $req) {

        $users = User::all();

        return view('admin.user_list', ['users' => $users]);
    }

    /*
     * Promotes the User to Admin
     */
    public function promoteUser($id, Request $req) {

        $user = User::find($id);
        $user->admin = true;
        $user->save();

        return redirect()->back()->with(['success' => 'User #' . $user->id . ' => ' . $user->name . ' Set to Admin']);
    }

    /*
     * Demotes Admin to normal user
     */
    public function demoteUser(Request $req, $id) {

        if ($req->user()->id == $id) {
            return redirect()->back()->with(['fail' => 'You can\'t demote Yourself']);
        }

        $user = User::find($id);
        $user->admin = false;
        $user->save();

        return redirect()->back()->with(['success' => 'User #' . $user->id . ' => ' . $user->name . ' Set to Normal User']);
    }
}
