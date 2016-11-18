function closeModal(){
			jQuery('#details-window').modal('hide');
			setTimeout(function(){
				jQuery('#details-window').remove();
				jQuery('.modal-backdrop').remove();
			},500);
		}