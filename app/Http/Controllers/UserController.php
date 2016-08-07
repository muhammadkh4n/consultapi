<?php
/**
 * Created by PhpStorm.
 * User: muhammadkh4n
 * Date: 8/5/16
 * Time: 8:03 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getRegisterModal(Request $req) {
        if ($req->ajax()) {
            $html = view('includes.modals.register')->render();
            return response()->json(['html' => $html]);
        }

        return 'Don\'t Access this from address bar!';
    }
}