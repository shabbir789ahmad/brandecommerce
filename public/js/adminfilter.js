
$(document).ready(function(){
 $('#cats').change(function(){
  var cat=$('#cats').val();
  $('#category').val(cat)
	$('#cat_form').submit()
	 

 });

$('#sub_cat').change(function(){

 var sub_cat=$('#sub_cat').val();
	$('#sub_category').val(sub_cat)
	$('#sub_form').submit()
});
	
$('#sub-order').change(function(){

 var drop=$(this).val();
 //alert (drop)
   
    $('#drop').val(drop)
    $('#drop_form').submit();
 
});

$('#status_search').change(function(){
  var stat=$(this).val();
  $('#status').val(stat);
  $('#status_form').submit();

});

});
	

