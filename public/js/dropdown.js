jQuery(document).ready(function ()
   {
    $('#main').on('change',function(){
       var id = $(this).val();
   
        if(id)
       {
         $.ajax({
             
              url : '/admin/get-sub-category/' +id,
              type : "GET",
              dataType : "json",
                
             success:function(sunmenue)
             {
              
             console.log(sunmenue)
             $('#sub').empty()
             $.each(sunmenue, function(key,value){
               $('#sub').append('<option disabled selected hidden>Select Category</option>')
             $('#sub').append('<option value="'+ key +'">'+ value +'</option>');
               $('#sub').css('textTransform', 'capitalize');
                });
            }

          });
       }
                      
   });


    $('#main-order').change(function(){
     
      var id=$(this).val();
      //alert (id)
      if(id)
      {
        $.ajax({
       
         url : "/admin/order-cat/" +id,
         type : "GET",
         dataType : "json",
     
       success:function(sub)
       {
        $('#sub-order').empty();
        $.each(sub, function(key,value){
          $('#sub-order').append('<option disabled hidden selected>Select Category</option>')
          $('#sub-order').append('<option value="' + key + '">'+ value +' </option>');

        });
       }
        });

      }
    });
});