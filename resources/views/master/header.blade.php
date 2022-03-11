<?php 
use App\Models\Category;
$sub=Category::category();
//echo "<pre>"; dd($sub);die;
?>


<div  style="overflow:hidden;background-color: #580631;">
  <div class="row top-nav" >
     @foreach($links as $lin)
    <div class="col-md-6 col-sm-0 col-0 d-none d-md-block col-lg-6">
       <p class="ml-2 mt-3 text-light">
     <span class="mr-2"><i class="fas fa-phone-square-alt fa-lg mr-2"></i>{{$lin['phone']}}</span> |
     <span class="ml-2"> <i class="fas fa-envelope fa-lg mr-2">
     </i>{{$lin['email']}}</span>  
       
     <span class="ml-2"> <i class="fas fa-map-marker-alt fa-lg  mr-2"></i> {{$lin['address']}}</span>
  </p>
    </div>
    @endforeach
    <div class="col-md-5 py-2 py-md-0 col-sm-11 col-11 col-lg-5 ">
   
 
    
 <div class="input-group mt-0 mt-md-1  text-center ml-4 ml-md-0" >
  <input type="text" class="form-control " placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-dark " style="background-color: #000000;">Search</button>
  </div>

 </div>
 
    </div>
  </div>
</div>
  
 <header class="shadow">
    <div class="container con2">
     <input type="checkbox" name="" id="check">
      <div class="logo-container">
        @foreach($logo as $log)
         <a href="{{url('/')}}"> <img src="{{asset('uploads/img/' .$log['logo'])}}" width="73%" class="mt-1"></a>
        @endforeach
      </div>
     <div class="nav-btn">
      <div class="nav-links">
       <ul>
        @foreach($sub as $su)
         <li class="nav-link px-0 py-1" style="--i: .85s">
           <a href="#">{{$su['category']}}<i class="fas fa-caret-down"></i></a>
           <div class="dropdown">
             @foreach($su['submenues'] as $subcategory)
              @if($su['id']==$subcategory['menue_id'])
              <ul>
                <li class="dropdown-link">
                 <a href="{{url('product/' .$subcategory['id'])}}">{{ucwords($subcategory['smenue'])}}<i class="fas fa-caret-down"></i></a>
                </li>
              </ul>
               @endif
             @endforeach   
            </div>
          </li>
         @endforeach 
       </ul>
     </div>   
  </div>

      <div class="icn mt-2 float-right mr-3 mr-md-0">
       
       
     @guest
          @if (Route::has('login'))
          <a class="  float-right" href="{{ route('login') }}"><i class="fas fa-user icon_color fa-2x mt-2 float-right"></i></a>
          @endif
          @else
        
          @if(Auth::user())
         
           
           <div class="btn-group profile_image">
          <img src="{{asset('uploads/img/'.Auth::user()->profile)}}" width="100%" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button"><a href="{{url('user_dashborad')}}"> Dashboard</a></button>
    <button class="dropdown-item" type="button"><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Log out
              </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-hidden">
               @csrf
             </form></button>
  </div>
</div>
          @endif
     @endguest
          
    <a href="{{url('get-wishlist')}}">
     <div id="ex4" class="float-right mt-2">
       <span class="p1 fa-stack fa-lg icon_color has-badge" data-count="{{ count((array) session('wishlist')) }}">
       <i class=" far fa-heart fa-stack-1x xfa-inverse fa-lg" data-count="4b"></i>
       </span>
     </div>
    </a>

          <a href="{{url('cart')}}">
             <div id="ex4" class="float-right mt-2">
          <span class="p1 fa-stack fa-lg icon_color has-badge" data-count="{{ count((array) session('cart')) }}">
         <i class=" fa fa-shopping-cart fa-stack-1x xfa-inverse fa-lg" data-count="4b"></i>
       </span>
       </div>
      
          </a>
          

            </div>      
  <div class="hamburger-menu-container">
   <div class="hamburger-menu">
        <div></div>
    </div>
  </div>
           
            
        </div>
    </header>
    