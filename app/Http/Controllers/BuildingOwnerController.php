<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\BuildingOwners;
use App\Booking;

class BuildingOwnerController extends Controller
{
    public function index(Request $request){

        $rooms = BuildingOwners::where('owner_id', Session::get('id'))->get();
        return view('backend.owners.index', compact('rooms'));
    }

    public function bookingList(Request $request){
        $builds = Booking::where('owner_id', Session::get('id'))->get();

        return view('backend.owners.bookingList', compact('builds'));
    }

    public function create(Request $request){
        return view('backend.owners.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3',
            'address' => 'required|min:5',
            'city' => 'required|min:3',
            'description' => 'required|min:5',
            'price' => 'required|min:2',
        ]);
        $data = new BuildingOwners();
        $data->owner_id = Session::get('id');
        $data->name = $request->input('name');
        $files = $request->file('file');
        $exe = $files->getClientOriginalExtension();
        $newName = rand(100000, 1001238912).".".$exe;
        $files->move('uploads/file', $newName);
        $data->file = $newName;
        $data->city = $request->input('city');
        $data->address = $request->input('address');
        $data->description = $request->description;
        $data->price = $request->input('price');
        $data->save();

        return redirect()->route('owners.index')->with('alert-success', 'Success Add Room '.$data->name);
    }

    public function edit($id){
        $rooms = BuildingOwners::where('id', $id)->get();

        return view('backend.owners.update', compact('rooms'));
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'name' => 'required|min:3',
            'city' => 'required|min:3',
            'address' => 'required|min:5',
            'description' => 'required|min:5',
            'price' => 'required|min:2',
        ]);

        $data = BuildingOwners::where('id', $id)->first();
        $data->owner_id = Session::get('id');
        $data->name = $request->name;
        if(empty($request->file('file'))){
            $data->file = $data->file;
        }
        else{
            unlink('uploads/file/'.$data->file);// menghapus file lama

            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/file',$newName);
            $data->file = $newName;
        }
        $data->city = $request->city;
        $data->address = $request->address;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->save();

        return redirect()->route('owners.index')->with('alert-success', "Success Update Data Room".$data->name);
    }

    public function detail($id){
        $rooms = BuildingOwners::where('id', $id)->get();

        return view('backend.owners.detail', compact('rooms'));
    }

    public function status(Request $request, $id){
        if(!$request->id){
            return redirect()->back();
        }

        $data = BuildingOwners::where('id', $id)->first();

        if($data->status == 1){
            $data->status = 0;
        }
        elseif($data->status == 0){
            $data->status = 2;
        }
        else{
            $data->status = 1;
        }

        $data->save();

        return redirect()->route('owners.index')->with('alert-success', 'Success Change Room Status!');
    }

    public function statusBooking(Request $request, $id){
        if(!$request->id){
            return redirect()->back();
        }

        $data = Booking::where('id', $id)->first();

        if($data->status == 1){
            $data->status = 0;
        }
        elseif($data->status == 0){
            $data->status = 2;
        }
        else{
            $data->status = 1;
        }

        $data->save();

        return redirect()->route('owners.bookingList')->with('alert-success', 'Success Change Your Booking Status!');
    }

    public function delete($id){

        $room = BuildingOwners::findOrFail($id);

        if(!$room->trashed()){
            $room->delete();
            return redirect()->route('owners.index')->with('alert-success', 'Success Delete Room!');
        }
    }

    public function restore(Request $request){
        $room = BuildingOwners::withTrashed()->findOrFail($request->restore);

        if(!$room->trashed()){
            return redirect()->route('owners.index')->with('alert-success', "Data Cannot to Restore");
        }else{
            $room->restore();
            return redirect()->route('owners.index')->with('alert-success', 'Data Success To Restore');
        }
    }
}
