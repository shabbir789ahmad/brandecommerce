function sort_by()
{
	var sort_value=$('#sort').val();

	 $('#brand').val(sort_value)
	 $('#sort_form').submit()

}

$('.sort_by_brand').change(function(){

	let brand=$(this).val();
	$('#brand').val(brand)
	 $('#sort_form').submit()
});

$('.sort_by_price').change(function(){

	let price=$(this).val();
	$('#price').val(price)
	 $('#price_form').submit()
});

$('.sort_by_sizes').change(function(){

	let price=$(this).val();
	$('#size2').val(price)
	 $('#color_form').submit()
});
$('.sort_by_new').change(function(){

	let price=$(this).val();
	$('#new2').val(price)
	 $('#new_form').submit()
});




function price_filter()
{
 var price_value=$('#price1').val();
 $('#price').val(price_value)
	  $('#price_form').submit()
}

function price_filter2()
{
 
 var price_value=$('#price2').val();
$('#price').val(price_value)
	  $('#price_form').submit()
}
function price_filter3()
{
 
 var price_value=$('#price3').val();
 
$('#price').val(price_value)
	  $('#price_form').submit()
}
function price_filter4()
{
 
 var price_value=$('#price4').val();
$('#price').val(price_value)
	  $('#price_form').submit()
}
//filter for admin product

