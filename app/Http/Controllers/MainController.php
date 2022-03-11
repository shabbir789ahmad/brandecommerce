<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Traits\ImageTrait;
class MainController extends Controller
{
    use ImageTrait;

  function uploadMain(Request $req)
  {
    $req->validate([
     'category'=>'required',
    
    ]);
    $main=new Category;
    $main->category=$req->category;
    $main->category_image=$this->image();
    
    $main->save();
    return redirect()->route('admin.get-main')->with('success','Main Category has been Uploaded');
  }

  function getMain()
  {
    $main=Category::all();

    return view('Dashboard.main.get_main',compact('main'));
  }

  function deleteMain($id)
  {
    $main=Category::findorfail($id);
    
    $main->delete();

    return redirect()->back()->with('success',"Main Category has been Deleted");
  }
  function updateMain($id)
  {
    $main=Category::findorfail($id);
   return view('Dashboard.main.main_update',compact('main'));
  }

  function updateMain2(Request $req)
   {
    $req->validate([
     'category'=>'required',
     
    ]);

     $main=Category::findorfail($req->id);
    $main->category=$req->category;
    $main->category_image=$this->image();
    
   
    $main->save();
    return redirect()->route('admin.get-main')->with('success','Main has been Updated');
  }

}
