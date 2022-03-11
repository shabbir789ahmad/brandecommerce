@extends('Dashboard.admin')
@section('content')
  
<div class="card shadow d-flex border  p-0 ">
  <div class="card-body text-dark">
    <div class="row">
     
      <div class="col-md-1">
       <a class="btn shadow border" href="{{url('get-product')}}">
       <i class="fab fa-product-hunt text-success text-center fa-2x mt-2"></i>Products</a>
      </div>
      <div class="col-md-1">
       <a class="btn shadow border" href="{{url('orders')}}">
        <i class="fas fa-store text-success text-center fa-2x mt-2"></i>
         Store</a>
      </div>

    <div class="col-md-8">
     <h4 class="text-center font-weight-bold mt-3 text-color">Update or Delete Product</h4>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('product')}}">
    <i class="fas fa-pencil-alt text-success fa-lg"></i>Update</a>
    </div>
    <div class="col-md-1">
     <a class="btn shadow border" href="{{url('product')}}">
     <i class="fas fa-trash-alt text-danger fa-lg"></i>Delete</a>
    </div>

  </div>
 </div>
</div>
   
<div class="card">
 <div class="card-body">
  <div class="row">
    <div class="col-md-1 col-sm-1  mt-3 mb-2" >
  
     @foreach($image as $d)
      <div class="box  " onclick="changepic(this)">
        <img  id="img1" src="{{asset('uploads/img/'.$d['rimage'])}}" width="100%" class=" d-block mt-1">
       </div>

      @endforeach

   
    </div>
    <div class="col-md-5 col-sm-10 mt-md-3  ">
     <div class="con mt-1  " id="mimage">
      @foreach($image as $d)
      @if($loop->first)
       <img  id="mimg" src="{{asset('uploads/img/' .$d['rimage'])}}" class="img-fluid d-block imgb border rounded" style="width: 90%; height: 35rem; overflow: hidden; ">
        <a href="{{url('admin/delete-image/' .$d['id'])}}"> <p class="overlay2 ">Delete</p></a> 
         <p class="overlay3 " data-id="{{$d['id']}}" data-imgi="{{$d['image_id']}}" data-img="{{$d['rimage']}}" id="update">Update</p>
      @endif
      @endforeach 
           
     </div>
    </div>
    <div class="col-md-6">
       
   <h6 class="font-weight-bold mt-3">Genral Detail</h6> 
    <hr class="mt-2">
   <div class="forme ">
    <form class="mt-4" action="{{url('admin/update-product-detail2')}}" method="POST" enctype="multipart/form-data">
      @csrf
    <input type="hidden" name="id" value="{{$product['id']}}">
    <input type="hidden" name="product_status" value="{{$product['hidden']}}">
    <input type="hidden" name="drop_id" value="{{$product['drop_id']}}">
    <input type="hidden" name="cat_id" value="{{$product['cat_id']}}">
    <input type="hidden" name="sub_id" value="{{$product['sub_id']}}">
     <div class="form-group ml-2">
  
      <div class="input-group clockpicker" id="clockPicker1">
        <label class="mr-3 ml-1">Product Name</label>
       <input type="text" name="name"  class="form-control" value="{{$product['name']}}">
        <div class="input-group-append">
         <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
       </div>                      
    </div>
  </div>
    <div class="form-group ml-2">
      <div class="input-group clockpicker" id="clockPicker1">
        <label class="mr-3 ml-1">Product Detail</label>
       <input type="text" name="detail"  class="form-control" value="{{$product['detail']}}">
        <div class="input-group-append">
         <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
       </div>                      
    </div>
  </div>
     <div class="form-group ml-2">

      <div class="input-group clockpicker" id="clockPicker1">
        <label class="mr-3 ml-1">Product price</label>
       <input type="text" name="price"  class="form-control" value="{{$product['price']}}">
        <div class="input-group-append">
         <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
       </div>                      
    </div>
  </div>
     <div class="form-group ml-2">
     <div class="input-group clockpicker" id="clockPicker1">
        <label class="mr-3 "> Discount Price</label>
       <input type="text" name="discount"  class="form-control" value="{{$product['discount']}}">
        <div class="input-group-append">
         <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
       </div>                      
    </div>
  </div>
  <div class="form-group ml-2">
     <div class="input-group clockpicker" id="clockPicker1">
        <label class="mr-3 ">Total Product</label>
       <input type="text" name="total"  class="form-control" value="{{$product['total']}}">
        <div class="input-group-append">
         <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
       </div>                      
    </div>
  </div>
   <div class="form-group ml-2">
     <div class="input-group clockpicker" id="clockPicker1">
        <label class="mr-3 ">Total Images</label>
       <input type="file" name="rimage"  class="form-control " value="{{$product['rimage']}}">
        <div class="input-group-append">
         <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
       </div>                      
    </div>
  </div>

   <button class="btn-color btn text-light btn-block mt-5">Update</button>
    </form>
   </div>
 
      
  
    </div>
  </div>
 </div>
</div>



<div class="row mt-3" style="color:#c14646">
<div class="col-md-6 ">
   @if ($alert = Session::get('success2'))
    <div class="alert alert-success">
        {{ $alert }}
    </div>
    @endif
<div class="card">
 <div class="card-body">
   <h6 class="font-weight-bold">Color <span class="float-right">Status</span></h6>
    <hr class="mt-2">

     @foreach($colors as $color)
      <p  class="filter2 mt-3 d-block">
      <i class="fas fa-circle fa-2x "
       style="color:{{$color['color']}} "></i>
        
         <i class="fas fa-edit text-success border ml-5 shadow p-2 book-color" data-id="{{$color['id']}}" data-color="{{$color['color']}}" data-status="{{$color['color_status']}}" data-filter="{{$color['filter_id']}}" ></i>
      
       <a href="{{url('admin/delete-color/' .$color['id'])}}">
       <i class="fas fa-trash-alt  border shadow p-2" 
       data-id="{{ $color->id }}"></i></a>
      
       <i class="fas fa-plus text-success p-2 border shadow" data-toggle="modal" data-target="#color-modal2"> </i>
       
       
     
     <input type="checkbox" data-id="{{ $color['id'] }}" name="color_status" class="js-switch2 " 
     {{ $color->color_status == 1 ? 'checked' : '' }} >
     </p>
    @endforeach
 </div>
</div>
</div>
<div class="col-md-6">
    @if ($alert = Session::get('size'))
    <div class="alert alert-success">
        {{ $alert }}
    </div>
    @endif
<div class="card">
  <div class="card-body">
    <h6 class="font-weight-bold">Sizes <span class="float-right">Status</span></h6>
     <hr class="mt-2">
    <div class=" top_cat ">
       @foreach($size as $siz)  
        @if($siz) 
        <p  class="filter2 mt-3 d-block"> 
         <button class="btn btn-sm btn-outline-secondary">{{$siz['size']}}</button>
        
           <i class="fas fa-edit text-success  ml-5 shadow book-size border p-2" data-id="{{$siz['id']}}" data-size="{{$siz['size']}}" data-status="{{$siz['size_status']}}" data-sid="{{$siz['size_id']}}"></i>
         
         <a href="{{url('admin/delete-size/' .$siz['id'])}}">
           <i class="fas fa-trash-alt  text-danger  shadow border p-2" ></i>
         </a>
         <i class="fas fa-plus text-success p-2 border  shadow" data-toggle="modal" data-target="#size-modal2"> </i>

         <input type="checkbox" data-id="{{ $siz['id'] }}" name="size_status" class="js-switch3 " 
         {{ $siz->size_status == 1 ? 'checked' : '' }} >
     </p>
      @endif
     @endforeach
    </div>
  </div>
</div>
</div>
<div class="col-md-6">
 
  @if ($alert = Session::get('brand'))
    <div class="alert alert-success">
        {{ $alert }}
    </div>
    @endif
<div class="card mt-2">
  <div class="card-body">
    <h6 class="font-weight-bold">Brands <span class="float-right">Status</span></h6>
    <hr class="mt-2">
  <div class="top_cat ml-3 filter">
   <ul class="list-unstyled">
    @foreach($store as $br)
    <li>
      <i class="fas fa-caret-right mr-2 fa-lg"></i>{{$br['brand']}}
       
      <i class="fas fa-edit text-success ml-5 btn-book border shadow p-2" data-id="{{ $br['id'] }}" data-brand="{{ $br['brand'] }}" data-status="{{ $br['brand_status'] }}" data-bid="{{ $br['brand_id'] }}"></i>

       <a href="{{url('admin/delete-brand/' .$br['id'])}}">
       <i class="fas fa-trash-alt text-danger shadow border p-2">
       </i></a>
        <i class="fas fa-plus text-success p-2 border shadow" data-toggle="modal" data-target="#brand-modal2"> </i>
         
     <input type="checkbox" data-id="{{ $br['id'] }}" name="brand_status" class="js-switch4 " 
     {{ $br->brand_status == 1 ? 'checked' : '' }} >
    </li>
    @endforeach
      
  </ul>
</div>



 </div>
</div>
</div>
</div>






<!--Brand Modal -->
<div class="modal fade" id="brand-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header text-dark" >
        <h5 class="modal-title" id="exampleModalLongTitle">Update Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('admin/update-store')}}" method="POST">
            @csrf
          <input type="hidden" id="id" name="id" value="">
         <div class="form-group">
          <div class="input-group clockpicker" id="clockPicker1">  <input type="text" id="brand" name="brand"  class="form-control "  value=""><br>
              
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-tag"></i></span>
          </div>                      
         </div>
       </div>
        <input type="hidden" id="brand_status" name="brand_status" value="">
        <input type="hidden" id="brand_id" name="brand_id" value="">
        <button class="btn-color btn text-light float-right mt-5 btn-lg">Update</button>
         </form>
      </div>
    </div>
  </div>
</div>


<!--brand Modal 2-->
<div class="modal fade" id="brand-modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header  text-dark">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('admin/add-store')}}" method="POST">
            @csrf
        
         <div class="form-group">
          <div class="input-group clockpicker" id="clockPicker1">  <input type="text" name="brand" placeholder="Brand Name" class="form-control "  value=""><br>
              
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-tag"></i></span>
          </div>                      
         </div>
       </div>
        
        <input type="hidden" id="brand_id" name="brand_id" value="{{$product['id']}}">
        <button class="btn-color btn text-light float-right mt-5 btn-lg">Update</button>
         </form>
      </div>
    </div>
  </div>
</div>

<!--size Modal -->
<div class="modal fade" id="size-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header  text-dark">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('admin/update-size')}}" method="POST">
            @csrf
          <input type="hidden" id="sid" name="id" value="">
         <div class="form-group">
          <div class="input-group clockpicker" id="clockPicker1">  <input type="text" id="size" name="size"  class="form-control "  value=""><br>
              
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-tag"></i></span>
          </div>                      
         </div>
       </div>
        <input type="hidden" id="size_status" name="size_status" value="">
        <input type="hidden" id="size_id" name="size_id" value="">
        <button class="btn-color mt-5 float-right text-light btn btn-lg">Update</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!--size Modal 2-->
<div class="modal fade" id="size-modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header  text-dark">
        <h5 class="modal-title" id="exampleModalLongTitle">Add More Size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('admin/add-size')}}" method="POST">
            @csrf
         <div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">
    <select class=" form-control" name="size" >
     <option value="xs">XS</option>
     <option value="sm">SM</option>
     <option value="md">MD</option>
     <option value="lg">LG</option>
     <option value="xl">XL</option>
    </select> 
    <div class="input-group-append">
     <span class="input-group-text add" id="img"><i class="fas fa-store"></i></span>
    </div>
 </div>
</div>
        
        <input type="hidden"  name="size_id" value="{{$product['id']}}">
        <button class="btn-color mt-5 float-right text-light btn btn-lg">Add</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!--color Modal -->
<div class="modal fade" id="color-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header  text-dark">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Color</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('admin/update-color')}}" method="POST">
            @csrf
          <input type="hidden" id="cid" name="id" value="">
         <div class="form-group">
          <div class="input-group clockpicker" id="clockPicker1">  <input type="color" id="color" name="color"  class="form-control "  value=""><br>
              
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-tag"></i></span>
          </div>                      
         </div>
       </div>
        <input type="hidden" id="color_status" name="color_status" value="">
        <input type="hidden" id="filter_id" name="filter_id" value="">
        <button class="btn-color btn text-light mt-5 float-right btn-lg">Update</button>
         </form>
      </div>
    </div>
  </div>
</div>
<!--color Modal 2-->
<div class="modal fade" id="color-modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header  text-dark">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Color</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('admin/add-color')}}" method="POST">
            @csrf
         
         <div class="form-group">
          <div class="input-group clockpicker" id="clockPicker1">  <input type="color" name="color"  class="form-control "  value=""><br>
              
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-tag"></i></span>
          </div>                      
         </div>
       </div>
        
        <input type="hidden"  name="filter_id" value="{{$product['id']}}">
        <button class="btn-color btn text-light mt-5 float-right btn-lg">Add </button>
         </form>
      </div>
    </div>
  </div>
</div>

<!--image Modal -->
<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header  text-dark">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mt-3">
        <form action="{{url('admin/update-image')}}" method="POST">
            @csrf
         <input type="text" name="id" id="idt" value="">
         <div class="form-group">
          <div class="input-group clockpicker" id="clockPicker1">  <input type="file" name="rimage" id="img" class="form-control "  value=""><br>
              
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-tag"></i></span>
          </div>                      
         </div>
       </div>
        
        <input type="text"  name="image_id" id="img_id" value="">
        <button class="btn-color btn text-light mt-5 float-right btn-lg">Update </button>
         </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  
  function changepic(a)
    {
      document.querySelector(".imgb").src=a.children[0].src;
       
    }
</script>

@endsection