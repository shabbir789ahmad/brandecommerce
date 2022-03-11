<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Logo;
use App\Models\Mainpage;
use App\Models\Image;
use Carbon\carbon;
class SliderController extends Controller
{
  function  women()
  {
    $slider=Slider::latest()->take('3')->get();
    
    $product= Category::
      join('products','categories.id','=','products.cat_id')
      ->leftjoin('reviews','products.id','=','reviews.review_id')
      ->select('review_id', \DB::raw('avg(rating) as rating')
      ,'products.id','products.name','products.discount','products.price','products.created_at')
      ->groupBy('review_id','products.id','products.name','products.discount','products.price','products.created_at')->orderBy('rating','DESC')
      ->get();
     
     foreach($product as $pro)
     {
      $pro->image=Image::where('image_id',$pro->id)->take(2)->get();
     }
    //dd($images);
    $front=Mainpage::latest()->take(1)->get();
    return view('home',compact('slider','product','front'));
  }

 


  function uploadSlider(Request $req)
  {
    $req->validate([
     'image'=>'required',
    
    ]);
    if($req->hasfile('image'))
    {
       $slider=new Slider;
      $file=$req->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time(). '.' .$ext;
            $file->move('uploads/img/', $filename);
            $slider->image=$filename;
    }
    
    $slider->save();
    return redirect()->back()->with('success','Slider has been Uploaded');
  }

  function getSlider()
  {
    $slider=Slider::all();

    return view('Dashboard..slider.get_slider',compact('slider'));
  }

  function deleteSlider($id)
  {
    $slider=Slider::findorfail($id);
    
    $slider->delete();

    return redirect()->back()->with('success',"Slider has been Deleted");
  }
  function updateSlider($id)
  {
    $slider=Slider::findorfail($id);
   return view('Dashboard.slider.slider_update',compact('slider'));
  }

  function updateSlider2(Request $req)
   {
    $req->validate([
     'image'=>'required',
     
    ]);

     $slider=Slider::findorfail($req->id);
    
    if($req->hasfile('image'))
    {
      
         $file=$req->file('image');
         $ext=$file->getClientOriginalExtension();
         $filename=time(). '.' .$ext;
         $file->move('uploads/img/', $filename);
         $slider->image=$filename;
    }
   
    $slider->save();
    return redirect()->route('admin.get-slider')->with('success','Slider has been Updated');
  }


  function Logo(Request $req)
  {
    $req->validate([
     'logo'=>'required',
     'text'=>'required',
    
    ]);
    if($req->hasfile('logo'))
    {
       $slider=new Logo;
      $file=$req->file('logo');
            $ext=$file->getClientOriginalExtension();
            $filename=time(). '.' .$ext;
            $file->move('uploads/img/', $filename);
            $slider->logo=$filename;
    }
    $slider->text=$req->text;
    $slider->save();
    return redirect()->route('admin.get-logo')->with('success','Logo has been Uploaded');
  }

  function getLogo()
  {
    $logos=Logo::all();
    return view('Dashboard.logo.logo_show',compact('logos'));
  }

  function deleteLogo($id)
  {
    $logo=Logo::findorfail($id);
    
    $logo->delete();

    return redirect()->back()->with('success',"Logo has been Deleted");
  }
    function updateLogo($id)
  {
    $logos=Logo::findorfail($id);
 
   return view('Dashboard.logo.logo_update',compact('logos'));
  }


  function updateLogo2(Request $req)
   {
    $req->validate([
     'image'=>'required',
     
    ]);

     $logo=Logo::findorfail($req->id);
    
    if($req->hasfile('logo'))
    {
      
         $file=$req->file('logo');
         $ext=$file->getClientOriginalExtension();
         $filename=time(). '.' .$ext;
         $file->move('uploads/img/', $filename);
         $slider->logo=$filename;
    }
   $logo->text=$req->text;
    $logo->save();
    return redirect()->route('admin.get-logo')->with('success','Logo has been Updated');
  }

  function search(Request $req)
  {
    $search=$req->search;
    $search2=Product::join('images','products.id','=','images.image_id')
    ->where('name','LIKE',"%{$search}%")->get();
  //dd($search2);
    return view('search',compact('search2'));
  }

}
