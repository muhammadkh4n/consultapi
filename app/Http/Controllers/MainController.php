<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function getHome() {
      return view('pages.home', ['email' => null]);
    }

    public function getUniversities() {
      return view('pages.universities');
    }
}
