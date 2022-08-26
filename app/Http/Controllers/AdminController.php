<?php

namespace App\Http\Controllers;
use App\Stationery;
use App\StationeryType;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function insertview(){
        $stationeryType = StationeryType::all();

        return view('admin.newstationery',['stationeryType'=>$stationeryType]);
    }

    public function add(Request $request){

        $this->validate($request, [
            'name'=>'required|min:5|unique:stationeries,name',
            'stationery_type_id' => 'required',
            'stock'=>'required|numeric|gt:0',
            'price'=>'required|numeric|gt:5000',
            'description'=>'required|min:10',
            'photo'=>'required',
        ]);

        $photo = $request->file('photo')->store('uploads','public');
        
        $new_stationery = new Stationery();
        $new_stationery->name = $request->name;
        $new_stationery->stationery_type_id = $request->stationery_type_id;
        $new_stationery->stock = $request->stock;
        $new_stationery->price = $request->price;
        $new_stationery->description = $request->description;
        $new_stationery->photo = $photo;
        $new_stationery->save();
        
        return redirect('admin/homepageadmin');
    }

    //type

    public function typeview(){
        $stationeryType = StationeryType::all();
        return view('admin.newtype',['stationeryType'=>$stationeryType]);
    }

    public function addtype(Request $request){
        
        $this->validate($request, [
            'photo'=>'required',
            'name' => 'required',
        ]);

        $phototype = $request->file('photo')->store('uploads','public');

        $new_stationerytype = new StationeryType();
        $new_stationerytype->name = $request->name;
        $new_stationerytype->photo = $phototype;
        $new_stationerytype->save();

        return redirect('admin/homepageadmin');
    }

    //update
    public function updatetypeview(){
        $stationeryType = StationeryType::all();
        return view('admin.updatetype',['stationeryType'=>$stationeryType]);
    }

    public function updatetype(Request $request){

        if($request->submitbtn == 'update'){
            $this->validate($request,[
                'name'=>'required',
            ]);
            StationeryType::where('id',$request->id)->update([
                'name'=>$request->name,
            ]);
            return redirect('admin/homepageadmin');
        }else{
            StationeryType::find($request->id)->delete();
            return redirect('admin/homepageadmin');
        }
    }

    public function updatestationeryview($id){
        $stationery = Stationery::find($id);
        return view('admin.updatestationery',['stationery'=>$stationery]);
    }

    public function deletestationery(Request $request){

        Stationery::find($request->id)->delete();

        return redirect('admin/homepageadmin');
    }

    public function editstationery(Request $request){
        $stationery = Stationery::find($request->id);

        return view('admin.editstationery',['stationery'=>$stationery]);
    }

    public function edits(Request $request){
        $this->validate($request,[
            'name'=>'required|min:5|unique:stationeries,name',
            'description'=>'required|min:10',
            'stock'=>'required|numeric|gt:0',
            'price'=>'required|numeric|gt:5000',
        ]);

        Stationery::where('id',$request->id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'stock'=>$request->stock,
            'price'=>$request->price,
        ]);

        return redirect('admin/homepageadmin');
    }

}
