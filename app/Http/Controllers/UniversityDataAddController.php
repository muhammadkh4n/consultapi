<?php

namespace App\Http\Controllers;

use App\Course;
use App\Field;
use App\FieldProp;
use App\LevelProp;
use App\University;
use App\UniversityInfo;
use App\Level;
use Illuminate\Http\Request;

use App\Http\Requests;

class UniversityDataAddController extends Controller
{
    /*
     * Add University to the Database. in dashboard view.
     */
    public function addUniversity(Request $req) {

        $this->validate($req, [
            'name' => 'required|unique:universities',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'email' => 'required|email',
            'website' => 'required|url|unique:universities',
            'established' => 'required|digits:4',
            'rank' => 'integer',
            'population' => 'required|integer',
            'intpopulation' => 'required|integer|max:' . $req['population'],
            'pkpopulation' => 'required|integer|max:' . $req['population'],
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

        $info = new UniversityInfo();
        $info->established = $req['established'];
        $info->rank = $req['rank'];
        $info->latitude = $req['latitude'];
        $info->longitude = $req['longitude'];
        $info->population = $req['population'];
        $info->intpopulation = $req['intpopulation'];
        $info->pkpopulation = $req['pkpopulation'];
        $info->extracur = $req['extracur'];

        $university->info()->save($info);

        return redirect()->back()->with(['success' => 'University Added Successfully!']);
    }

    /**
     * Adds new level to the database.
     * @param Request $req Level Form Data
     * @return \Illuminate\Http\RedirectResponse the user back to university info page with success.
     */
    public function addLevel(Request $req) {
        $this->validate($req, [
            'level_name' => 'required|unique:levels',
        ]);

        $level = new Level();
        $level->level_name = $req->level_name;
        $level->save();

        return redirect()->back()->with(['success' => 'Level Added Successfully!']);
    }

    /**
     * Adds level properties to university
     * @param Request $req Level Props Form data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addLevelProps(Request $req) {

        $this->validate($req, [
            'level_id' => 'required|numeric',
            'university_id' => 'required|numeric',
            'level_tuition' => 'integer|max:50000'
        ]);

        $levelp = LevelProp::where('university_id', $req->university_id)->get();
        foreach ($levelp as $prop) {
            if ($prop->level_id == $req->level_id) {
                return redirect()->back()->with(['fail' => 'Level Already Added!']);
            }
        }

        $level_props = new LevelProp();
        $level_props->level_tuition = $req->level_tuition;
        $level_props->university()->associate(University::find($req->university_id));
        $level_props->level()->associate(Level::find($req->level_id));
        $level_props->save();

        return redirect()->back()->with(['success' => 'Level Added to University Successfully']);
    }

    /**
     * Adds field properties to university
     * @param Request $req Field Props form data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addFieldProps(Request $req) {

        $this->validate($req, [
            'field_id' => 'required|numeric',
            'field_level_id' => 'required|numeric',
            'university_id' => 'required|numeric',
            'field_tuition' => 'integer|max:50000',
            'field_rank' => 'integer',
            'ent_req' => 'required',
            'duration' => 'required|integer|max:8'
        ]);

        $university = University::find($req->university_id);
        if (count($university->level_props()->get()) <= 0) {
            return redirect()->back()->with(['fail' => 'Please Add levels to the University First!']);
        }

        $fieldp = FieldProp::where('university_id', $req->university_id)->get();
        foreach ($fieldp as $prop) {
            if (($prop->level_id == $req->field_level_id) && ($prop->field_id == $req->field_id)) {
                return redirect()->back()->with(['fail' => 'Field Already Added!']);
            }
        }

        $field_props = new FieldProp();
        $field_props->field_tuition = $req->field_tuition;
        $field_props->field_rank = $req->field_rank;
        $field_props->ent_req = $req->ent_req;
        $field_props->duration = $req->duration;
        $field_props->university()->associate($university);
        $field_props->level()->associate(Level::find($req->field_level_id));
        $field_props->field()->associate(Field::find($req->field_id));
        $field_props->save();

        return redirect()->back()->with(['success' => 'Field Added to University Successfully']);
    }

    /**
     * Adds new field to the database.
     * @param Request $req Field Form Data
     * @return \Illuminate\Http\RedirectResponse back to level view.
     */
    public function addField(Request $req) {
        $this->validate($req, [
            'field_name' => 'required|unique:fields'
        ]);

        $field = new Field();
        $field->field_name = $req->field_name;
        $field->save();

        return redirect()->back()->with(['success' => 'Field Added Successfully!']);
    }

    public function addCourse(Request $req) {
        $this->validate($req, [
            'course_field_id' => 'required|numeric',
            'course_level_id' => 'required|numeric',
            'university_id' => 'required|numeric',
            'course_name' => 'required',
            'course_rank' => 'integer',
            'accred' => 'string',
            'careers' => 'required'
        ]);

        $university = University::find($req->university_id);
        if (count($university->field_props()->get()) <= 0) {
            return redirect()->back()->with(['fail' => 'Please Add Fields to the University First!']);
        }

        $courses_check = Course::where('university_id', $req->university_id)->get();
        foreach ($courses_check as $course) {
            if ($course->course_name == $req->course_name) {
                return redirect()->back()->with(['fail' => 'Course with this name was already added to the University!']);
            }
        }

        $course = new Course();
        $course->course_name = $req->course_name;
        $course->course_rank = $req->course_rank;
        $course->careers = $req->careers;
        $course->accred = $req->accred;
        $course->field()->associate(Field::find($req->course_field_id));
        $course->level()->associate(Level::find($req->course_level_id));
        $course->university()->associate($university);

        $course->save();

        return redirect()->back()->with(['success' => 'Course Added to University Successfully']);
    }
}
