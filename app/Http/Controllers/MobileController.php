<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;

class MobileController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["mobiles"] = Mobile::all();
        return view('mobiles.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $mobile = Mobile::findOrFail($id);
        $viewData["title"] = $mobile["name"]." - Online Store";
        $viewData["subtitle"] =  $mobile["name"]." - ".$mobile->getModel();
        $viewData["mobile"] = $mobile;
        return view('mobiles.show')->with("viewData", $viewData);
    }
    public function search(Request $request)
    {
        if($request->filled('search')){
            $mobiles = Mobile::search($request->search)->get();
        }else{
            $mobiles = Mobile::get()->take('5');
        }
        $viewData = [];
        $viewData['mobiles'] = $mobiles;
          
        return view('mobiles.search')->with("viewData", $viewData);;
    }
}
