    function detailsmodal(id){
          jQuery.ajax({
            url: '/E-shop2/views/details-model.php',
            type: 'POST',
            data: {id : id},
            success: function(data){
            jQuery('body').append(data);
            jQuery('#details-window').modal('toggle');
            },
            error: function(){
                alert("SOmething went wrong");
            }
        });
    }