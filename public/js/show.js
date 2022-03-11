$(document).ready(function(){

 $('.front_image').on('mouseover',function(e){
  
    $(this).css('display','none')
    $(this).parents('a').siblings('a').find('.back_image') .css('display','block')
 });

 $('.back_image').on('mouseout',function(e){
  
    $(this).css('display','none')
    $(this).parents('a').siblings('a').find('.front_image') .css('display','block')
 });
});