<?php

namespace App\Http\Controllers;

use App\Expert;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ColumnSearchingController extends Controller
{
    function index(Request $request)
    {
        if(request()->ajax())
        {
            if($request->category)
            {
                $data = DB::table('experts')
                    ->join('category', 'category.category_id', '=', 'experts.company_type')
                    ->select('experts.id', 'experts.company_name', 'category.category_name', 'experts.first_name', 'experts.last_name', 'experts.email', 'experts.phone')
                    ->where('experts.company_type', $request->category);
            } else
            {
                $data = DB::table('experts')
                    ->join('category', 'category.category_id', '=', 'experts.company_type')
                    ->select('experts.id', 'experts.company_name', 'category.category_name', 'experts.first_name', 'experts.last_name', 'experts.email', 'experts.phone');
            }
            return datatables()->of($data)->make(true);
        }

        $category = DB::table('category')
            ->select("*")
            ->get();
        return view('column_searching', compact('category'));
    }

    public function edit($id)
    {
        //Edit the entry from the main page on entry ID
        $expert = Expert::find($id);
        return view('edit',compact('expert'));
    }

    public function delete($id)
    {
        //Delete an entry from the DB
        Expert::find($id)->delete();
        return redirect(route('column_searching'))->with('successMsg', 'Expert Removed');
    }
}