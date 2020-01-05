<?php

namespace App\Http\Controllers;

use App\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'companyName' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required',
                'phone' => 'required'
            ]);

        $expert = new Expert;
        $expert->company_name = $request->companyName;
        $expert->first_name = $request->firstName;
        $expert->last_name = $request->lastName;
        $expert->email = $request->email;
        $expert->phone = $request->phone;
        $expert->save();
        return redirect(route('home'))->with('successMsg', 'Expert Successfully Added');
    }
}
