<?php

namespace App\Http\Controllers;

use App\Field;
use App\Level;
use App\University;
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

    /**
     * Gets University list in the dashboard.
     */
    public function getUniversityList() {

        $countries = CountryListFacade::getList('en', 'php', 'cldr');
        $universities = University::orderBy('created_at', 'desc')->get();

        return view('admin.uni_list', ['universities' => $universities, 'countries' => $countries]);
    }

    /**
     * Gets data for a university by uni_id.
     * @param $uni_id University id.
     * @return View with data.
     */
    public function getUniversity($uni_id) {
        $fields = Field::all();
        $levels = Level::all();

        $university = University::find($uni_id);
        $level_props = $university->level_props()->get();
        $field_props = $university->field_props()->get();
        $courses = $university->courses()->get();

        return view('admin.uni_info', [
            'levels' => $levels,
            'fields' => $fields,
            'university' => $university,
            'level_props' => $level_props,
            'field_props' => $field_props,
            'courses' => $courses,
        ]);
    }

    /**
     * Gets all the levels and fields.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLevelsAndFields() {
        $levels = Level::all();
        $fields = Field::all();

        return view('admin.levels_and_fields', [
            'levels' => $levels,
            'fields' => $fields,
        ]);
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
