@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-  d-flex mr-1">

    <a href="{{url('admin/get-product')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Product
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color"></h4>
   </div>
 </div>

<a href="{{url('admin/get-product')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('admin/get-product')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>
    
<div class="card mt-2  shadow" >
   <div class="card-body ">
    <h4 class="card-header bg-dark text-light font-weight-bold">
 <i class="fab fa-product-hunt"></i> Upload Product
    </h4>
            
<form action="{{url('admin/uproduct')}}" method="POST" enctype="multipart/form-data" class="mt-5">
     @csrf

 <div class="row">
 <div class="col-md-6">

 <span class="text-danger">@error('cat_id') Main Category Field is required @enderror</span>
<div class="form-group">
  <label class="font-weight-bold">Select Category</label>
<div class="input-group clockpicker" id="clockPicker1">

  <select class="form-control select border-secondary" id="main2" name="cat_id" required="">
    <option disabled selected hidden> Select Main Category</option>
         @foreach($main as $key=> $mc)
     <option value="{{$key}}">{{ucfirst($mc)}}</option>
     @endforeach
    </select> 
                      
          <div class="input-group-append">
           <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>                      
           </div>
        </div>
</div>
<div class="col-md-6">
<span class="text-danger">@error('sub_id') Category Field is required @enderror</span>
<div class="form-group">
  <label class="font-weight-bold">Select Sub Category</label>
  <div class="input-group clockpicker" id="clockPicker1">
    <select class="form-control select  subcategory border-secondary"  name="sub_id" required="">
            
      </select>
   <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-calendar"></i></span>
    </div>                      
   </div>
</div>
           
</div>

<div class="col-md-12">
 <span class="text-danger">@error('name') {{$message}} @enderror</span>
<div class="form-group">
  <label class="font-weight-bold">Product Name</label>
 <div class="input-group clockpicker" id="clockPicker1">
    <input type="text" name="name" placeholder="Product Name" class="form-control border-secondary" value="{{old('name')}}" required="">
    <div class="input-group-append">
    <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
    </div>                      
    </div>
  </div>
</div>
<div class="col-md-12">
   <label class="font-weight-bold">Product detail</label> 
   <textarea class="form-control border-secondary" name="detail" rows="5" placeholder="Product details Here" required></textarea>  
   <span class="text-danger">@error('detail') {{$message}} @enderror</span>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label class="font-weight-bold mt-2">Product Sizes</label> 
   <div class="input-group clockpicker" id="clockPicker1">
     <select class="select3-multiple border-secondary form-control" name="size[]" multiple="multiple" id="select2Multiple" required="">
      <option value="xs">xs</option>
      <option value="sm">sm</option>
      <option value="md">md</option>
      <option value="lg">lg</option>
      <option value="xl">xl</option>
     
     </select>
    <div class="input-group-append">
    <span class="input-group-text add" id="img">Sizes</span>
   </div>
  </div>
 </div> 
 <span class="text-danger">@error ('size') {{$message}} @enderror</span>
</div>

<div class="col-md-6">
  <span class="text-danger">@error('total') {{$message}} @enderror</span>
                               
  <div class="form-group">
    <label class="font-weight-bold mt-2">Product Stock</label> 
   <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="total" placeholder="Product Quentity" class="form-control border-secondary"  value="{{old('total')}}" required=""><br>
              
    <div class="input-group-append ">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>

</div>
<div class="col-md-6">
   <span class="text-danger">@error('price') {{$message}} @enderror</span>
                               
  <div class="form-group">
      <label class="font-weight-bold">Product Price</label> 
   <div class="input-group clockpicker" id="clockPicker1">   
     <input type="text" name="price" placeholder="Product Price" class="form-control border-secondary"  value="{{old('price')}}" required=""><br>
              
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>
  
</div>
<div class="col-md-6">
 <span class="text-danger">@error('ship') {{$message}} @enderror</span>
          
    <div class="form-group">
        <label class="font-weight-bold">Product Shipping Cost</label> 
   <div class="input-group clockpicker" id="clockPicker1">
     <input type="text" name="ship" placeholder="Product Shipping Cost" class="form-control border-secondary"  value="{{old('discount')}}" required="">
                 
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
 </div>
</div>
<div class="col-md-6">
  <div class="color" id="more">
   <div class="form-group" >
    <label class="font-weight-bold">Product Color</label> 
    <div class="input-group clockpicker" id="clockPicker1">
      <input type="color" name="" placeholder="Product Color border-secondary" class="form-control " id="color"  value="" required="">
     <div class="input-group-append">
      <span class="input-group-text add" id="add"><i class="fas fa-plus"> Add</i></span>
     </div>                      
    </div>
  </div>
 </div> 
<div class="colors d-flex" id="box">
 <span class="text-danger">@error ('color') {{$message}} @enderror</span>
</div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label class="font-weight-bold">Product Brand</label> 
 <div class="input-group clockpicker" id="clockPicker1">
    <select class="select2-multiple form-control border-secondary" name="brand[]" multiple="multiple" id="select2Multiple" required="">
      @foreach($brand as $b)
      <option value="{{$b['bname']}}">{{$b['bname']}}</option>
       @endforeach
    </select>
    <div class="input-group-append">
    <span class="input-group-text add" id="img"><i class="fas fa-store"></i></span>
  </div>
 </div>
</div>
</div>


<div class="col-md-6">
 
   <div class="form-group">
        <label class="font-weight-bold">Product Image</label> 
   <div class="input-group clockpicker" id="clockPicker1">
     <input type="file" name="rimage" class="form-control border-secondary" multiple  required="">
                 
    <div class="input-group-append">
   <span class="input-group-text"><i class="fas fa-tag"></i></span>
   </div>                      
  </div>
  <span class="text-danger"> Press Ctr To Select Multiple Images</span>
 </div>
     


</div>


</div>
           


   
  <button  class="btn s btn-block btn-color text-light mt-5" disabled>Submit</button>
  </form>
 </div>        
</div>
</div>

 




@endsection
