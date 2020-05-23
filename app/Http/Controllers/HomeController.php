<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Member::all();
        return view('home',compact('data'));
    }
    public function store(Request $request){
        $data =$request->all();
        $data= Member::storemem($data);
        return response()->json(["msg"=>"successfully Added","data"=>$data],200);

    }
}
