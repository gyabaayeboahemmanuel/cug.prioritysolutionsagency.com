    $(document).ready(function(){
        $('#createPersonalDetails').on('submit', function(event){

            event.preventDefault();

           jQuery.ajax({
            url:"{{route ('createPersonalDetails')}}",
            data:jQuery('#createPersonalDetails').serialize(),
            type:'post',
              
            success:function(result){   
                jQuery('#createPersonalDetails')[0].reset();
            }

           })

        });
    });
