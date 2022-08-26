<?php

namespace App\Http\Controllers;
use App\Stationery;
use App\StationeryType;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function searchStationery(){
        $stationeries = Stationery::all();
        return view('stationeries',compact('stationeries'));
    }

    public function homepageadmin(){
        $stationery = DB::table('stationeries')->paginate(6);
            return view('admin.homepageadmin',['stationery'=>$stationery]);
    }
    
    public function homepage(){
        $stationery = DB::table('stationeries')->paginate(6);
            return view('homepage',['stationery'=>$stationery]);
    }

    public function index(){
        return view('welcome');
    }
    
    public function search(Request $request){

        if(Auth::check() && Auth::user()->role == 'admin'){
            $name = $request->input('name');
            $stationery = Stationery::where('name','like',"%$name%")
            ->paginate(6);
    
            return view('admin.homepageadmin',['stationery'=>$stationery]);
        }else{
            $name = $request->input('name');
            $stationery = Stationery::where('name','like',"%$name%")
            ->paginate(6);
    
            return view('homepage',['stationery'=>$stationery]);
        }
        
    }
}