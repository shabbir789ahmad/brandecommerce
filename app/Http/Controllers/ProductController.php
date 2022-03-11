<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Dropdown;
use App\Models\Color;
use App\Models\Size;
use App\Models\Store;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{

    function subCategory()
    {
        
     $main = DB::table("categories")->pluck("category","id");
     $brand = Brand::all();
     
      return view('Dashboard.product.product_form',compact('main','brand'));
    }


public function subCategory2($id) 
 {        
    $sub = DB::table("submenues")->where('menue_id',$id)
    ->pluck("smenue","id");
    return response()->json($sub);
  }

// public function dropCat($id) 
//  {        
//    $drop = DB::table("dropdowns")->where('dropdown_id',$id)->pluck("name","id");
//    return response()->json($drop);
// }

function uploadProduct(Request $req)
 {
  
     $req->validate([
          'name'=>'required|max:300',
          'detail'=>'required|max:300',
          'price'=>'required',
          'total'=>'required',
          'size'=>'required',
          'brand'=>'required',
          'ship'=>'required',
          'color'=>'required',
          'cat_id'=>'required',
          'sub_id'=>'required',
        ]);

    
     
   DB::transaction(function() use($req)
   {
   

        $product= Product::create([
       'name'=> $req->name,
       'detail'=> $req->detail,
       'price'=> $req->price,
       'ship'=> $req->ship,
       'total'=> $req->total,
       'product_status'=>'1',
       'cat_id'=> $req->cat_id,
       'sub_id'=> $req->sub_id,
      
      ]);
   
    
        
       
    $n = sizeof($req->color);
    for($i = 0; $i < $n; $i++) 
    {
       $color= Color::create([
       'color' => $req->color[$i],
       'color_status' =>'1',
       'filter_id' =>$product->id,
        ]);
      }
    
    $n2 = sizeof($req->size);
    for($i = 0;  $i < $n2; $i++)
     {

      $brand= Size::create([
      'size' =>$req->size[$i],
      'size_status' =>'1',
      'size_id' =>$product->id,
      ]);
     }
     
       $n3 = sizeof($req->brand);
    for($i = 0;  $i < $n3; $i++)
     {
        $brand= Store::create([
      'brand' =>$req->brand[$i],
      'brand_status' =>'1',
      'brand_id' =>$product->id,
      ]);
     }
    
    foreach($req->file('rimage') as $file)
     {
       Image::create([
       $ext=$file->getClientOriginalExtension(),
       $name=$file->getClientOriginalName(),
       $filename=$name,
       $file->move('uploads/img/', $filename),
       'rimage'=>$filename,
       'image_id'=> $product->id,
        ]);
      
     }
       
       
     
  });
return redirect()->route('admin.product')->with('success','Product Uploaded Successfully');
}



  //function for product detail 
  function productDetail($id)
  {
    $detail= Product::
         leftjoin('reviews','products.id','=','reviews.review_id')
        
        ->select('review_id', \DB::raw('avg(rating) as rating')
        ,'products.id','products.name','products.discount','products.price','reviews.review_id','products.created_at','products.detail')
        ->groupBy('review_id','products.id','products.name','products.discount','products.price','reviews.review_id','products.created_at','products.detail')->orderBy('rating','DESC')
        ->findorfail($id);

    $images=Image::where('image_id',$id)->get();
    //dd($images);
      
     $detail2= Product::
     leftjoin('reviews','products.id','=','reviews.review_id')
     ->select('review_id', \DB::raw('avg(rating) as rating')
        ,'products.id','products.name','products.discount','products.price','reviews.review_id','products.created_at')
        ->groupBy('review_id','products.id','products.name','products.discount','products.price','reviews.review_id','products.created_at')->orderBy('rating','DESC')
        ->get();
        foreach($detail2 as $dt)
        {
            $dt->image=Image::where('image_id',$dt->id)->take(1)->get();
        }

        $color= Product::
        join('colors','products.id','=','colors.filter_id')
        ->where('filter_id',$id)
        ->get();
        $size= Product::
         join('sizes','products.id','=','sizes.size_id')
         ->where('size_id',$id)
        ->get();
        $brand= Product::
         join('stores','products.id','=','stores.brand_id')
         ->where('brand_id',$id)
        ->get();
        $review= Product::
         join('reviews','products.id','=','reviews.review_id')
         ->join('users','users.id','=','reviews.user_id')
         ->select('users.profile','reviews.message','reviews.rating','reviews.uname')->where('review_id',$id)
        ->get();
  
        return view('productpage',compact('detail','detail2','images','color','size','brand','review'));
  }  

    

  function allproduct($id, Request $req)
  {
    $brand="";
    $size="";
    $price="";
   

     $now=Carbon::now();
    
   
    
     $new="";
    if($req->get('new2') !== Null)
    {
        $new=$req->get('new2');
    }
     $price="";
    if($req->get('price') !== Null)
    {
        $price=$req->get('price');
    }
   
  
    $query= Product::select('products.id','products.name','products.discount','products.price','products.created_at','products.detail')
       ->where('sub_id',$id);
         
    

      if($req->get('brand') !== Null)
       {
        $query=$query->join('stores','products.id','=','stores.brand_id')->where('brand',$req->get('brand'));
        }

       if($req->get('size2') !== Null)
        {
        $query=$query->join('sizes','products.id','=','sizes.size_id')->where('size',$req->get('size2'));
        }

        

        //sort by week and month
        
         if($new=='this')
        {
           $start = $now->startOfWeek()->format('Y-m-d H:i');
           $end = $now->endOfWeek()->format('Y-m-d H:i');
           $query=$query->whereBetween('products.created_at',[$start,$end]);
        }
        if($new=='last')
        {
       
           $query=$query->where('products.created_at','>=',Carbon::now()->subdays(15));
        }
        if($new=='month')
        {
            $query=$query->whereMonth('products.created_at', date('m'));
        }
   // price filter
      if($price)
        {
       
           $query=$query->where('products.discount','>=',$price);
        }
         
        $query=$query->paginate(10);
   
     $product=$query;

       foreach($product as $pro)
     {
      $pro->image=Image::where('image_id',$pro->id)->take(2)->get();
     }
     $color= Product::
        leftjoin('colors','products.id','=','colors.filter_id')
        ->select('products.sub_id','colors.color','colors.filter_id')
          ->where('sub_id',$id)
        ->get();
       $size= Product::
        leftjoin('sizes','products.id','=','sizes.size_id')
         ->where('size_id',$id)
        ->get();
        $brand= Brand::all();
          
       
      
        return view('product',compact('product','color','brand','size'));
  }

  function getProduct(Request $req)
  {
     $main=Category::all();
     $sub=Dropdown::all();
     $cat='';
     $sub2='';
     if($req->get('category') !== Null)
     {
        $cat=$req->get('category');
     }
     if($req->get('sub_category') !== Null)

     {
        $sub2=$req->get('sub_category');
     }
     //echo $sub2;
     $query= Category::
     join('products','categories.id','=','products.cat_id')
      ->select('products.id','products.name','products.detail','products.price','products.discount','products.product_status','products.total',);
      if($cat)
       {
        $query=$query->where('products.cat_id',$cat);
        }

        if($sub2)
        {
         $query=$query->where('products.drop_id', $sub2);
        }

        $query=$query->paginate(10);
       $product=$query;
       $images=$product->map(function($value,$index){
         
         return Image::where('image_id',$value['id'])->select('rimage','image_id')->first();

       });
       //dd($image);
     
    return view('Dashboard.product.product_show',compact('product','main','sub','images'));
  }

  function deleteProduct($id)
  {
    $product=Product::findorfail($id);
    $product->delete();

    return redirect()->back()->with('success','Product Deleted Permanently');
  }
 
    function updateProduct($id)
  {
    $product=Product::findorfail($id);
    $colors=Color::where('colors.filter_id',$id)->get();
    $size=Size::where('sizes.size_id',$id)->get();
    $store=Store::where('stores.brand_id',$id)->get();
    $image=Image::where('images.image_id',$id)->latest()->get();
    

    return view('Dashboard.product.product_update',compact('product','colors','size','store','image'));
  }

  function UpdateDetail2(Request $req)
  {

    DB::Transaction(function() use($req)
    {
      $data=Product::findorfail($req->id);
      $data->name=$req->name;
      $data->detail=$req->detail;
      $data->price=$req->price;
      $data->discount=$req->discount;
      $data->total=$req->total;
      $data->drop_id=$req->drop_id;
      $data->cat_id=$req->cat_id;
      $data->sub_id=$req->sub_id;
      $data->product_status=$req->product_status;
       
       $data->save();

      $image=new Image;
      
        if ($req->hasfile('rimage')) {
          $file=$req->file('rimage');
          $ext=$file->getClientOriginalExtension();
          $filename=time(). '.' .$ext;
          $file->move('uploads/img/',$filename);
          $image->rimage=$filename;
        }
        
        $image->image_id=$data->id;
        $image->save();

    });
   

    return redirect()->back()->with('success','Product Updated');
  }


  function productStatus(Request $req)
  {
    $product=Product::findorfail($req->id);
   $product->product_status=$req->product_status;
   $product->save();
  }
    function colorStatus(Request $req)
  {
    $color=Color::findorfail($req->id);
   $color->color_status=$req->color_status;
   $color->save();
  }
    function sizeStatus(Request $req)
  {
    $size=Size::findorfail($req->id);
   $size->size_status=$req->size_status;
   $size->save();
  }
function brandStatus(Request $req)
  {
    $store=Store::findorfail($req->id);
   $store->brand_status=$req->brand_status;
   $store->save();
  }
}
