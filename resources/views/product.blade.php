@extends('master.master')
@section('content')
<title>Product</title>
<div class="contain mt-4" style="display: flex; justify-content: center;">
 <div class="row"  style="width:95%; overflow: hidden;">
  <div class="col-md-3 p-0">
   <select class="form-control sort_by_brand"  >
    <option disabled selected hidden>Sort By Brand</option>
    @foreach($brand as $br)
      <option>{{$br['bname']}}</option>
    @endforeach
   </select>
  </div>
  <div class="col-md-3 px-1">
   <select class="form-control sort_by_price" >
   
      <option disabled selected hidden>Sort By Price</option>
      <option>1000</option>
      <option>2000</option>
      <option>3000</option>
      <option>4000</option>
      <option>5000</option>
      <option>6000</option>
   
   </select>
  </div>
  <div class="col-md-3 px-1">
   <select class="form-control sort_by_sizes" >
    <option disabled selected hidden>Sort By Sizes</option>
      <option>xs</option>
      <option>sm</option>
      <option>md</option>
      <option>lg</option>
      <option>xl</option>
      <option>vl</option>
   </select>
  </div>
  <div class="col-md-3 p-0">
   <select class="form-control sort_by_new" >
    <option disabled selected hidden>Sort By Newest</option>
      <option value="this">This Week</option>
      <option value="last">Last Week</option>
      <option value="month">This Month</option>
   </select>
  </div>
 </div>
</div>
<!-- 
<div class="wrapper3">
      
  <nav id="sidebar" class="shadow border-right">
 
    <p class=" filter3 ml-3 mt-5">By Brand <span class="float-right mr-2">See All</span></p>   
<div class="top_cat ml-3 filter">
  <ul class="list-unstyled">
    @foreach($brand as $br)
    <li>
      <a href="javascript:void(0)" onclick="setbrand('{{$br['bname']}}')" >
        <i class="fas fa-caret-right mr-2 fa-lg"></i>{{$br['bname']}}
      </a>
    </li>
    @endforeach
      
  </ul>
</div>
       <hr class="ml-3 bg-dark ">
     <div class="filter3">
      <p class="  filter3 ml-3 ">Sort By <span class="float-right mr-2">See All</span></p>
</div>
<div class="top_cat ml-3">
  <ul class="list-unstyled ">
    @foreach($brand as $br)
    <li>
      <a href="javascript:void(0)" onclick="setbrand('{{$br['bname']}}')" class="filter2">
       <span class="label">
        <input type="checkbox" name="filter_brand" >
        <label class="ml-2"> {{$br['bname']}}</label>
       </span>
      </a>
    </li>
    @endforeach
  </ul>
</div>
     <hr class="ml-3 bg-dark ">
     <div class="filter">
      <p class="  filter3 ml-3">Color <span class="float-right mr-2">See All</span></p>
      <div class="top_cat">
      <ul class="list-unstyled fl ml-3">
        @foreach($color as $pro)  
        @if($pro)   
      <li>
      <a href="javascript:void(0)" onclick="setcolor('{{$pro['color']}}') " class="filter2">
     <i class="fas fa-circle fa-2x " style="color: {{$pro['color']}};"></i>
     <span class="mb-5 ml-2">{{ucfirst($pro['color'])}}</span></a>
     </li>
     @else

     @endif
     @endforeach
      
     
          </ul>
        </div>
       </div>
  
     <hr class="ml-4 bg-dark">
    
      <p class=" ml-4 filter3">Size <span class="float-right mr-2">See All</span></p>

       <div class=" top_cat ml-4">
         @foreach($color as $pro)  
        @if($pro)  
         <a href="javascript:void(0)" onclick="setsize('{{$pro['size']}}')">
          <button class="btn btn-sm btn-outline-secondary">{{$pro['size']}}</button>
        </a>
         @endif
         @endforeach
      </div>
    
     <hr class="mt-4 ml-4 bg-dark">

     <div class="filter">
      <p class="  filter3 ml-3 ">Price<span class="float-right mr-2">See All</span></p>
    </div>
     <div class="top_cat ml-3">
      <ul class="list-unstyled ">
    
       <li>
      <a href="javascript:void(0)" onclick="price_filter()" class="filter2">
      <span class="label">
     <input type="checkbox" name="filter_brand" id="price1" value="1000">
       <label class="ml-2"> Under 1000Rs </label>
     </span>
     </a>
     </li>
    
           <li>
      <a href="javascript:void(0)" onclick="price_filter2()" class="filter2">
      <span class="label">
     <input type="checkbox" name="filter_brand" id="price2" value="2000">
       <label class="ml-2"> Under 2000Rs </label>
     </span>
     </a>
     </li>
          <li>
      <a href="javascript:void(0)" onclick="price_filter3()" class="filter2">
      <span class="label">
     <input type="checkbox" name="filter_brand" id="price3" value="3000">
       <label class="ml-2"> Under 3000Rs </label>
     </span>
     </a>
     </li>
        <li>
      <a href="javascript:void(0)" onclick="price_filter4()" class="filter2">
      <span class="label">
     <input type="checkbox" name="filter_brand" id="price4" value="3100">
       <label class="ml-2"> Under 3000Rs </label>
     </span>
     </a>
     </li>
      </ul>
   </div>
     
   
     
<hr class="mt-4 ml-4 bg-dark">
<div class="filter">
      <p class="  filter3 ml-3 ">New Arrival <span class="float-right mr-2">See All</span></p>
    </div>
     <div class="top_cat ml-3">
      <ul class="list-unstyled ">
     
       <li>
      <a href="javascript:void(0)" onclick="newarrival()" class="filter2">
      <span class="label">
    <input type="checkbox" name="filter_brand" id="n" value="this">
       <label class="ml-2"> This Week</label>
     </span>
     </a>
     </li>
       <li>
      <a href="javascript:void(0)" onclick="newarrival2()" class="filter2">
      <span class="label">
    <input type="checkbox" name="filter_brand" id="ne" value="last">
       <label class="ml-2"> Last Week</label>
     </span>
     </a>
     </li>
        <li>
      <a href="javascript:void(0)" onclick="newarrival3()" class="filter2">
      <span class="label">
    <input type="checkbox" name="filter_brand" id="ne3" value="month">
       <label class="ml-2"> This Month</label>
     </span>
     </a>
     </li>
      </ul>
      </div>        

  </nav>
 -->
       
<!-- <div id="content">

   <nav class="navbar mb-0 navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <button type="button" id="sidebarCollapse" class="btn btn-info d-block d-md-none">
      <i class="fas fa-align-left "></i>
                        <span>Filter</span>
      </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
              </div>
             </div>
   </nav> -->


<div class="container-fluid mt-4" style="display:flex; justify-content: center;">
 <div class="row"  style="width:95%;">
  @foreach($product as $pro)
    <div class="col-sm-4 p-0 col-12 col-md-4 col-lg-3 mx-1">
     <div class="card">
      <div class="hover">
       @foreach($pro->image as $img)
        @if($loop->first)
       <a href="{{url('productpage/'.$pro['id'])}}"><img  src="{{asset('uploads/img/'.$img->rimage)}} "   class="card-img-top front_image" alt="..." loading="lazy"></a>
      @endif
       @if($loop->last)
       <a href="{{url('productpage/'.$pro['id'])}}" ><img  src="{{asset('uploads/img/'.$img->rimage)}} "   class="card-img-top back_image" alt="..." loading="lazy" style="display:none;"></a>
      @endif
       @endforeach
        <!--<a href=""><p class="overlay3">New</p></a>  -->
        <a href="{{url('wishlist/' .$pro['id'])}}"> <i class=" far fa-heart overlay2 fa-lg" data-count="4b"></i></a> 
      </div>
      <div class="card-body p-0 pt-1 ">
       <p class="text-center">{{ucwords($pro['name'])}}</p>
       <div class="bottem_text d-flex">
        <p class="m-0 sizes pl-2">Sizes: <span>Xl</span></p>
        <p class="ml-auto m-0 mr-3">PKR {{$pro['price']}}</p>
       </div>
      </div>
     </div>
   </div>
  @endforeach
  {{ $product->links() }}
 </div>
</div>




           
  <!--  </div>
    </div> -->

   
<form id="sort_form">
  <input type="hidden" name="brand" id="brand">
</form>

<form id="color_form">
  <input type="hidden" name="size2" id="size2">
</form>
<form id="new_form">
  <input type="hidden" name="new2" id="new2">
</form>
<form id="price_form">
  <input type="hidden" name="price" id="price">
</form>
@endsection