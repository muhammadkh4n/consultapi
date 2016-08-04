<?php

namespace App\Http\Controllers;

use App\University;
use App\UniversityInfo;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;

class UniversityController extends Controller {

    public function getUniversities() {
        $universities = University::all();
        return view('admin.dashboard-list', ['universities' => $universities]);
    }

    public function getUniversityForm() {
        $countries = CountryListFacade::getList('en', 'php', 'cldr');
        return view('admin.dashboard-form', ['countries' => $countries]);
    }

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
            'intpopulation' => 'required|numeric',
            'pkpopulation' => 'required|numeric',
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

        return redirect()->route('admin.dashboard')->with(['success' => 'University Added Successfully!']);
    }

}