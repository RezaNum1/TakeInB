<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\BuildingOwners;

class TakersController extends Controller
{
    public function index(Request $request){
        $builds = BuildingOwners::all();

        return view('backend.takers.index', compact('builds'));
    }

    public function checkin($id){
        $builds = BuildingOwners::where('id', $id)->get();
        $takers = Users::where('id', Session::get('id'))->get();
        $dateCurrent = date('Y-m-d');

        return view('backend.takers.checkin', compact('builds', 'takers', 'dateCurrent', 'until'));
    }
}
