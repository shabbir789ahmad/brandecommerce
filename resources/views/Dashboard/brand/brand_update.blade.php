@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('admin/brand')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text_color fa-lg"></i> Upload
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text_color">Update Brands </h4>
   </div>
 </div>

<a href="{{url('admin.get-brand')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text_color fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('admin.get-brand')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>
       <div class="container-fluid">
        <div class="row">
          <div class="col-md-2 col-sm-1">

          </div>
          <div class="col-md-8  col-sm-10 border border-success mt-5 p-5">
            
<form action="{{url('admin/update-brand2')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$brand['id']}}">
 <span class="text-danger mt-3">@error('menue_id') {{$message}} @enderror</span>
<br>
<label class="mt-3">Brand Name</label>  
<div class="form-group">
 <div class="input-group clockpicker" id="clockPicker1">
   <input type="text" name="bname" placeholder="Product Name" class="form-control" value="{{$brand['bname']}}">
   
  <div class="input-group-append">
    <span class="input-group-text">
      <i class="fab fa-product-hunt"></i>
    </span>
  </div>                      
 </div>
</div>
<span class="text-danger">@error('bname') {{$bname}} @enderror</span>

<button  class="btn btn-block btn-color text-light mt-5">Submit</button>
  </form>
          </div>
          <div class="col-md-2 col-sm-1">
         
         </div>
       </div>



 
</div>


@endsection