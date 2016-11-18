

function add_to_cart(){

	jQuery('#modal_errors').html("");
	var size  = jQuery('#size').val();
	var quantity  = jQuery('#quantity').val();
	var error = '';
	var success_data = '';

	if (size == '' || quantity == '') {
		error += '<p class="text-danger text center "> You must choose a size and quantity </p>';
		jQuery('#modal_errors').html(error);
		return;
	}

	else{
		
		success_data += '<p class="text-success"> You have successfully added this item to your cart! </p>';
		jQuery('#success').html(success_data);
		return;
				  
					


	}

}

