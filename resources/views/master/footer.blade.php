
<div class="cof">
 <div class="card">
  <div class="card-body">
   <div class="row mt-5">
    <div class="col-md-3 col-12 col-sm-12 text-center text-md-lext">  
      <div class="footer_intro">
        @foreach($logo as $log)
       <img src="{{asset('uploads/img/'.$log['logo'])}}" width="60%">
       
       <p>{{$log['text']}}</p>
        @endforeach
      </div>
      <div class="social_icon">
        @foreach($links as $link)
       <a href="{{$link['facebook']}}"><i class="fa-brands fa-facebook-f f"></i></a>
       <a href="{{$link['twitter']}}"><i class="fa-brands fa-twitter "></i></a>
       <a href="{{$link['instagram']}}"><i class="fa-brands fa-instagram"></i></a>
       <a href="{{$link['linked']}}"><i class="fa-brands fa-linkedin"></i></a>
       @endforeach
      </div>
    </div>
    <div class="col-md-2 col-12 col-sm-12  mt-2 mt-md-0">
      <div class="footer_intro">
       <h5>Category</h5>
      </div>
      <ul class="p-0 footer_list">
        <li><a href="{{url('/')}}"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>Home</a></li>
        <li><a href="{{url('about')}}"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>About</a></li>
        <li><a href="{{url('contact')}}"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>Contact</a></li>
        <li><a href="#"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>Feedback</a></li>
     </ul>
    </div>
    <div class="col-md-2 col-12 col-sm-12">
      <div class="footer_intro">
       <h5>Most Liked</h5>
      </div>
      <ul class="p-0 footer_list">
     @foreach($submenues->slice(0,4) as $subcategory)
      <li><a href="{{url('product/' .$subcategory['id'])}}"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>{{$subcategory['smenue']}}</a></li>
      @endforeach
       
     </ul>
    </div>
    <div class="col-md-2 col-12 col-sm-12">
     <div class="footer_intro">
       <h5>Best Collection</h5>
      </div>
      <ul class="p-0 footer_list">
       
        @foreach($submenues->slice(4,8) as $subcategory)
      <li><a href="{{url('product/' .$subcategory['id'])}}"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>{{$subcategory['smenue']}}</a></li>
      @endforeach
     </ul>
    </div>
    <div class="col-md-2 col-12 col-sm-12">
     <div class="footer_intro">
       <h5>Best Collection</h5>
      </div>
      <ul class="p-0 footer_list">
       
        @foreach($submenues->slice(8,12) as $subcategory)
      <li><a href="{{url('product/' .$subcategory['id'])}}"><i class="fa-solid fa-arrow-right ml-2 d-inline-block d-sm-block d-md-none"></i>{{$subcategory['smenue']}}</a></li>
      @endforeach
     
     </ul>
    </div>
   </div>
  </div>
 </div>
</div>