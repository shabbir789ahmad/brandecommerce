@extends('master.master')
@section("content")
<title>Home</title>
  <div id="carouselslider" class="carousel slide " data-ride="carousel">
    <div class="carousel-inner" style="height: 38rem;">
      @foreach($slider as $slide)
      <div class="carousel-item  @if($loop->first) active @endif caro" >
        <img class="d-block w-100" src="{{asset('uploads/img/' .$slide['image'])}}" alt="Firstlide" loading="lazy" height="600rem">
      </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselslider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselslider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


<div class="container-fluid mt-5 "> 
 <h3 class="text-center ml-3 heading_line">WHY SHOP WITH US
 </h3>
</div>
<div class="container mt-3">
  <div class="row">
   <div class="col-md-4">
    <div class="card rounded">
     <div class="card-body rounded d">
      <i class="fa-solid fa-truck fa-2x"></i>
       <h4>Fast Delivery</h4>
       <p class="text-center">variations of passages of Lorem Ipsum available</p>
     </div>
    </div>
   </div>
   <div class="col-md-4">
    <div class="card rounded">
     <div class="card-body rounded  d">
      <i class="fa-solid fa-truck fa-2x"></i>
       <h4>Fast Delivery</h4>
       <p class="text-center">variations of passages of Lorem Ipsum available</p>
     </div>
    </div>
   </div>
   <div class="col-md-4">
    <div class="card rounded">
     <div class="card-body rounded d">
      <i class="fa-solid fa-truck fa-2x"></i>
       <h4>Fast Delivery</h4>
       <p class="text-center">variations of passages of Lorem Ipsum available</p>
     </div>
    </div>
   </div>
  </div>

</div>
    

<div class="container-fluid mt-5 ">
 
 <h3 class="text-center ml-3 heading_line">NEW ARRIVALS
 </h3>
</div>



<div class="container-fluid mt-4" style="display:flex; justify-content: center;">
 <div class="owl-carousel owl-theme ml-2"  style="width:95%;">
  @foreach($product as $pro)
    <div class="item mx-1">
     <div class="card">
      <div class="hover">
       @foreach($pro->image as $img)
        @if($loop->first)
       <a href="{{'productpage/'.$pro['id']}}"><img  src="{{asset('uploads/img/'.$img->rimage)}} "   class="card-img-top front_image" alt="..." loading="lazy"></a>
      @endif
       @if($loop->last)
       <a href="{{'productpage/'.$pro['id']}}" ><img  src="{{asset('uploads/img/'.$img->rimage)}} "   class="card-img-top back_image" alt="..." loading="lazy" style="display:none;"></a>
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
 
 </div>
</div>

<div class="container-fluid mt-5 ">
 
 <h3 class="text-center ml-3 heading_line"> LIKED CATEGORY
 </h3>
</div>
<div class="container-fluid mt-4" style="display:flex; justify-content: center;">
 <div class="row"  style="width:95%;">
  <div class="col-md-6">
   <div class="row">
    <div class="col-md-12 border">
      @foreach($submenues as $category)
      @if($loop->first)
      <figure class="figure ">
       <a href="{{url('product/' .$category['id'])}}"><img src="{{asset('uploads/img/'.$category['menue_image'])}}" class="rounded ims" loadding="lazy"></a>
       <p>{{$category['smenue']}}</p> 
     </figure>
     @endif
     @endforeach
    </div>
    
      @foreach($submenues->slice(0,2) as $category)
      <div class="col-md-6">
       <figure class="figure2">
       <a href="{{url('product/' .$category['id'])}}"><img src="{{asset('uploads/img/'.$category['menue_image'])}}"class="rounded"  width="100%" loadding="lazy"></a>
       <p>{{$category['smenue']}}</p> 
     </figure>
    </div>
    @endforeach
   </div>
  </div>
  <div class="col-md-6">
   <div class="row">
    
    @foreach($submenues->slice(2,2) as $category)
      <div class="col-md-6">
       <figure class="figure2">
       <a href="{{url('product/' .$category['id'])}}"><img src="{{asset('uploads/img/'.$category['menue_image'])}}"class="rounded"  width="100%" loadding="lazy"></a>
       <p>{{$category['smenue']}}</p> 
     </figure>
    </div>
    @endforeach
    <div class="col-md-12 border">
       @foreach($submenues as $category)
       @if($loop->last)
      <figure class="figure ">
       <a href="{{url('product/' .$category['id'])}}"><img src="{{asset('uploads/img/'.$category['menue_image'])}}" class="rounded ims" loadding="lazy"></a>
       <p>{{$category['smenue']}}</p> 
     </figure>
     @endif
     @endforeach
    </div>
   </div>

  </div>
  </div>
</div>


<div class="container-fluid mt-5 ">
 
 <h3 class="text-center ml-3 heading_line">TRENDING
 </h3>
</div>

<div class="container-fluid mt-4" style="display:flex; justify-content: center;">
 <div class="owl-carousel owl-theme ml-2"  style="width:95%;">
  @foreach($product as $pro)
    <div class="item mx-1">
     <div class="card">
      <div class="hover">
       @foreach($pro->image as $img)
        @if($loop->first)
       <a href="{{'productpage/'.$pro['id']}}"><img  src="{{asset('uploads/img/'.$img->rimage)}} "   class="card-img-top front_image" alt="..." loading="lazy"></a>
      @endif
       @if($loop->last)
       <a href="{{'productpage/'.$pro['id']}}" ><img  src="{{asset('uploads/img/'.$img->rimage)}} "   class="card-img-top back_image" alt="..." loading="lazy" style="display:none;"></a>
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
 
 </div>
</div>

<div class="container-fluid text-center" style="margin-top: 10%; margin-bottom: 8%;">
 
 <h3 class=" heading_line mt-5 mb-3">Newsletter
 </h3>
 <p class="mt-3 mb-3">Subscribe to our newsletter and be the first to receive the latest fashion news, promotions and more!</p>
 <div class=" mt-4" style="display:flex;justify-content: center;" >
 <div class="input-group mb-3 text-center" style="width:50%">
  <input type="text" class="form-control py-4" placeholder="Subscribe Or Newsletter" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-dark px-5" style="background-color: #000000;">Subscribe</button>
  </div>
</div>
 </div>
</div>

  @endsection 