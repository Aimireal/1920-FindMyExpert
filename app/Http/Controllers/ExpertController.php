<?php

namespace App\Http\Controllers;

use App\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index()
    {
        //Display the experts
        $experts = Expert::paginate(10);
        return view('welcome', compact('experts'));
    }

    public function create()
    {
        //Create view to add new user
        return view('create');
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
                'phone' => 'required'
            ]);

        $expert = new Expert;
        $expert->company_type = $request->companyType;
        $expert->company_name = $request->companyName;
        $expert->first_name = $request->firstName;
        $expert->last_name = $request->lastName;
        $expert->email = $request->email;
        $expert->phone = $request->phone;
        $expert->save();
        return redirect(route('home'))->with('successMsg', 'Expert Successfully Added');
    }

    public function edit($id)
    {
        //Edit the entry from the main page on entry ID
        $expert = Expert::find($id);
        return view('edit',compact('expert'));
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
                'phone' => 'required'
            ]);

        $expert = Expert::find($id);
        $expert->company_type = $request->companyType;
        $expert->company_name = $request->companyName;
        $expert->first_name = $request->firstName;
        $expert->last_name = $request->lastName;
        $expert->email = $request->email;
        $expert->phone = $request->phone;
        $expert->save();
        return redirect(route('home'))->with('successMsg', 'Expert Updated');
    }

    public function delete($id)
    {
        //Delete an entry from the DB
        Expert::find($id)->delete();
        return redirect(route('home'))->with('successMsg', 'Expert Removed');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function details()
    {
        //View more of selected user ToDo: Add reviews and ratings. Setup like the above

    }

    public function view()
    {
        //Create view to add new user
        return view('view');
    }

}
