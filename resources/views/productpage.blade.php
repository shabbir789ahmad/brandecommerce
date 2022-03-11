@extends('master.master')
@section('content')
 <title>Product Detail</title>

<div class="container  mt-3" style="overflow:hidden">
  <div class="card">
    <div class="card-body">
  <div class="row ">
   <div class="col-md-6  p-0 float-right">
     @foreach($images as $d)
     @if($loop->first)

        <img id="mimg" src="{{asset('uploads/img/' .$d['rimage'])}}" class="block__pic imgs mt-3  shadow" data-title="Red Valentino" data-help="Используйте колесико мыши для Zoom +/-">
   
     @endif
     @endforeach            
        <div class=" details-images2 border">
        @foreach($images as $d)
        <div class="ml-1" style="display: inline-block;" onclick="changepic(this)">
        <img  id="img1" src="{{asset('uploads/img/'.$d['rimage'])}}" height="150rem" width="130rem" class="  mt-1 rounded border"  >
       </div>
       @endforeach
      </div>
  </div>
  <div class="col-md-6">

      
       <div class=" d-flex mt-3" style="height:2rem">
        <h5 class="names">{{ucfirst($detail['name'])}}</h5>
        <div class="icon ml-auto">
          <i class="fa-solid fa-share-nodes fa-lg pr-3"></i>
         <i class=" far fa-heart fa-lg" ></i>
        </div>
       </div>
       <div class="item_pri">
        <div class="icon2 d-flex">
           <p class="pt-0 "> @if($detail['rating'])
            @for($i=0; $i<5; $i++)
            @if($i<$detail['rating'])
             <span class="fa fa-star checked fa-xs"></span>
            @else
             <span class="fa fa-star fa-xs"></span>
             @endif
             @endfor
             @endif</p>
             <p>(1)Review</p>
         </div>
         
       </div>
       <p class="p-name">PKR {{ $detail['price']}}.00 <span class="text-danger">PKR<del>{{$detail['discount']}}.00</del></span></p>
       <div class="d-flex">
        <p class="p_detail m-0">{{ucfirst($detail['detail'])}}</p>
       </div>
      
        <h6 class="p-name mt-3">Color:</h6>
           <p class=" text-dark   ml-3 ml-md-0">
   <span >
    @foreach($color as $s)
      
       <label class="containers ">
     <input type="radio" checked="checked" name="radio">
       <span class="checkmark" style="
  position: absolute;
  top: 0;
  left: 0;
  height: 2.3rem;
  width: 2.3rem;
    padding: 11% 0;
    text-align: center;
  background-color:{{$s['color']}};
  border-radius: 5%;
"></span>
     </label>
     @endforeach
    </span>
  </p>
  <h6 class="p-name pb-0 pt-4 ">Size:</h6>
   <div class="d-flex mt-0 mt-md-3 mb-5">

    @foreach($size as $s)
     <label class="span ">
     <input type="radio" checked="checked" name="size" value="{{$s['size']}}">
       <span class="checkmark" style="
  position: absolute;
  top: 0;
  left: 0;
  padding: 11% 0;
  height: 2.3rem;
  width: 2.3rem;
  border: 1px solid #1F2833;
  border-radius: 5%;
  text-align: center;
">{{$s['size']}}</span>
     </label>
    
    @endforeach
  </div>
   <a href="{{url('add-to-cart/'.$detail['id'])}}" class="mt-5">
   <button class="btn  btn-lg btn-color btn-block text-light mt-5 mt-md-3 rounded" >Add To Cart</button>
  </a>
      </div>
     </div>

   </div>
</div>
</div>
<hr>

     
<div class="container-fluid mt-3 mt-5">
 <h2 class="font-weight-bold ml-3 ">Related Products</h2>
</div>
 <!-- slider for populer categories -->

<div class="container-fluid mt-4">
 <div class="owl-carousel owl-theme ml-2">

@foreach($detail2 as $pro)
    <div class="item">
     <div class="card ">
      <div class="hover">
        @foreach($pro->image as $img)
        @if($loop->first)
       <a href="{{'productpage/'.$pro['id']}}"><img  src="{{asset('uploads/img/'.$img->rimage)}}" class="card-img-top" alt="..."></a>
        <a href="{{url('add-to-cart/'.$pro['id'])}}"><p class="overlay">Add To Cart</p></a>
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
     <div class="container-fluid mt-5">
      <h2 class="font-weight-bold ml-3 text-center ">Reviews</h2>
      </div>

<div class="container mt-4" >
   <div id="carouselslider" class="carousel slide " data-ride="carousel">
    <div class="carousel-inner">
      @foreach($review as $slide)
      <div class="carousel-item text-center slider_text  @if($loop->first) active @endif " >
        <div class="review_image">
        <img class="d-block w-100 " src="{{asset('uploads/img/' .$slide['profile'])}}" alt="Firstlide" loading="lazy">
      </div>
      <h4 class="mt-2">{{ucfirst($slide['uname'])}}</h4>
      <h6>Customer</h6>
      <p>Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.</p>
    </div>
      @endforeach
    </div>
    <a class="carousel-control-prev left" href="#carouselslider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next right" href="#carouselslider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>







<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header form-review ">
        <p class=" text-light mt-3">Review This Product</p>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form class="" action="{{url('review')}}" method="Post">
    @csrf
    
     <input type="text" name="uname" placeholder="Name" class="form-control mt-2">
     <span class="text-danger">@error ('uname') User name Required @enderror</span>
     <input type="text" name="rating" placeholder="Your Rating" class="form-control mt-2">
     <span class="text-danger">@error ('rating') {{$message}}@enderror</span>
     <input type="hidden" name="review_id" value="{{$detail['id']}}" class="form-control mt-2">
     <textarea class="form-control mt-2 " name="message" rows="5" placeholder="Your Message"></textarea>
     <span class="text-danger">@error ('message') {{$message}}@enderror</span><br>
     <button  class="btn btn-pro py-3 rounded btn-block text-light mt-4">Send </button>
   </form>
      </div>
    
    </div>
  </div>
</div>



<script type="text/javascript">
    
    function changepic(a)
    {
      document.querySelector(".imgs").src=a.children[0].src;
       
    }
    function incr()
    {
      let a=document.getElementById('val');
       a.value++;
    }
function decr()
{
  let a=document.getElementById('val');
       a.value--;
    if (a.value<1) {
      a.value=1;
    }
}
 

</script>
 
@endsection