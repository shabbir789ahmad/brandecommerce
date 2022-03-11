$(document).ready(function(){
 
 /* $('.delete').click(function(){
  	if(!confirm('This will be Deleted Permanently')){
  		return false;
  	}
    let id = $(this).data('id');
     var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "/admin/delete-color/" +id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("done");
        }
    });
  }); */

    $(document).on('click', '.btn-book', function(event) {
      $('#brand-modal').modal('show');
      var idt=$(this).data('id');
      $('#id').val(idt);
      var idt=$(this).data('brand');
      $('#brand').val(idt);
      var idt=$(this).data('status');
      $('#brand_status').val(idt);
      var idt=$(this).data('bid');
      $('#brand_id').val(idt);
    });

    $(document).on('click', '.book-size', function(event) {
     $('#size-modal').modal('show');
     var idt=$(this).data('id');
      $('#sid').val(idt);
      var idt=$(this).data('size');
      $('#size').val(idt);
      var idt=$(this).data('status');
      $('#size_status').val(idt);
      var idt=$(this).data('sid');
      $('#size_id').val(idt);
    });

    $(document).on('click', '.book-color', function(event) {
     $('#color-modal').modal('show');
     var idt=$(this).data('id');
      $('#cid').val(idt);
      var idt=$(this).data('color');
      $('#color').val(idt);
      var idt=$(this).data('status');
      $('#color_status').val(idt);
      var idt=$(this).data('filter');
      $('#filter_id').val(idt);
    });

    $('#update').click(function(){
        $('#image-modal').modal('show');
        var idi=$(this).data('id');
        $('#idt').val(idi);
        var idg=$(this).data('img');
        $('#img').val(idg);
        var idi=$(this).data('imgi');
        $('#img_id').val(idi);
    });


     $('.status').click(function(){
        $('#modal-status').modal('show')
        
       
        var id=$(this).data('sid')
         $('#ids').val(id)
         
          var status=$(this).data('status')
         $('#status').val(status)
        
    });
   
    
});