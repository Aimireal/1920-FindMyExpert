<?php

namespace App\Http\Controllers;

use App\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpertController extends Controller
{
    public function index()
    {
        //Display the homepage
        return view('welcome');
    }

    public function create()
    {
        //Create view to add new user
        $category = DB::table('category')
            ->select("*")
            ->get();
        return view('create', compact('category'));
    }

    public function store(Request $request)
    {
        //Store the values into the DB for add button
        $this->validate($request,
            [
                'companyType' => 'required',
                'companyName' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'latitude' => 'required',
                'longitude' => 'required'
            ]);

        $expert = new Expert;
        $expert->company_type = $request->companyType;
        $expert->company_name = $request->companyName;
        $expert->first_name = $request->firstName;
        $expert->last_name = $request->lastName;
        $expert->email = $request->email;
        $expert->phone = $request->phone;
        $expert->address = $request->address;
        $expert->latitude = $request->latitude;
        $expert->longitude = $request->longitude;
        $expert->save();
        return redirect(route('column-searching'))->with('successMsg', 'Expert Successfully Added');
    }

    public function edit($id)
    {
        //Edit the entry from the main page on entry ID
        $category = DB::table('category')
            ->select("*")
            ->get();

        $expert = Expert::find($id);
        return view('edit',compact('expert'))->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        //Update the entry we have changed under edit, almost same as store
        $this->validate($request,
            [
                'companyType' => 'required',
                'companyName' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'latitude' => 'required',
                'longitude' => 'required'
            ]);

        $expert = Expert::find($id);
        $expert->company_type = $request->companyType;
        $expert->company_name = $request->companyName;
        $expert->first_name = $request->firstName;
        $expert->last_name = $request->lastName;
        $expert->email = $request->email;
        $expert->phone = $request->phone;
        $expert->address = $request->address;
        $expert->latitude = $request->latitude;
        $expert->longitude = $request->longitude;
        $expert->save();
        return redirect(route('column-searching'))->with('successMsg', 'Expert Updated');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function columnSearching()
    {
        //Browse view
        $experts = Expert::all();
        $category = DB::table('category')
            ->select("*")
            ->get();
        return view('column_searching')->with(compact('category'))->with(compact('experts'));
    }

    public function mapsView()
    {
        //Maps view
        $experts = DB::table('experts')
            ->select("*")
            ->get();
        return view('maps')->with('experts', $experts);
    }

    public function view($id)
    {
        //Edit the entry from the main page on entry ID
        $category = DB::table('category')
            ->select("*")
            ->get();

        $expert = Expert::find($id);
        return view('view',compact('expert'))->with('category', $category);
    }

}
