$(document).ready(function() {
     $('.form').prop('disabled', true);
     $('input[type="text"]').keyup(function() {
        if($(this).val() != '') {
           $('.s').prop('disabled', false);
        }

       
     });
      $('.form').prop('disabled', true);
     $('input[type="email"]').keyup(function() {
        if($(this).val() != '') {
           $('.s').prop('disabled', false);
        }

       
     });
      $('.form').prop('disabled', true);
     $('input[type="password"]').keyup(function() {
        if($(this).val() != '') {
           $('.s').prop('disabled', false);
        }

       
     });


  
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                     
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });    
   

     
 });


