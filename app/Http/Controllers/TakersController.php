<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\BuildingOwners;
use App\Booking;

class TakersController extends Controller
{
    public function index(Request $request){
        $builds = BuildingOwners::all();

        return view('backend.takers.index', compact('builds'));
    }

    public function bookingreq(Request $request){
        $books = Booking::where('customer_id', Session::get('id'))->get();

        return view('backend.takers.bookingreq', compact('books'));
    }

    public function checkin($id){
        $builds = BuildingOwners::where('id', $id)->get();
        $takers = Users::where('id', Session::get('id'))->get();
        $dateCurrent = date('Y-m-d');

        return view('backend.takers.checkin', compact('builds', 'takers', 'dateCurrent', 'until'));
    }

    public function bookingPro(Request $request){
        $this->validate($request, [
            'booking_date' => 'required',
        ]);

        $data = new Booking();
        $data->customer_id = $request->customer_id;
        $data->owner_id = $request->owner_id;
        $data->building_id = $request->building_id;
        $data->booking_date = $request->booking_date;
        $data->total_price = (($request->price)*($request->duration));

        //Random Key For Booking_Code
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < 6; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }

        $data->booking_code = $str;
        $data->description = $request->description;
        $data->save();


        return redirect()->route('auth.login')->with('alert-success', 'Success Join As Owner');
    }
}
