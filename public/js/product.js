$(document).ready(function()
{
  
   $('#main2').on('change',function(){
      let id=$(this).val()
      if(id)
      {
         $.ajax({
           
           url : '/admin/product/' +id,
           type : "GET",
           dataType :"json",

           success:function(sub)
           {
            $('.subcategory').empty()
            $('.subcategory').append('<option hidden disabled selected> Select Category</option>')
            $.each(sub,function(key,value){
             $('.subcategory').append('<option value="'+ key +'">'+ value +'</option>')
               $('.subcategory').css('textTransform', 'capitalize');
            });
           }

         });
      }
   
   });
 

  $('#sub2').on('change',function(){
      let id=$(this).val()
      if(id)
      {
         $.ajax({
           
           url : '/admin/product2/' +id,
           type : "GET",
           dataType :"json",

           success:function(drop)
           {
            $('#drop').empty()
            $('#drop').append('<option hidden disabled selected> Select Sub Category</option>')
            $.each(drop,function(key,value){
             $('#drop').append('<option value="'+ key +'">'+ value +'</option>')
               $('#drop').css('textTransform', 'capitalize');
            });
           }

         });
      }
   
   });

});


$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});