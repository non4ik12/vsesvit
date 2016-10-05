$('#vs-ask_form').submit(function(e){
	$.ajax({
		url: '/ajax/sendQuestion',
		method: 'post',
		dataType: 'json',
		data: $(e.target).serialize()
	}).done(function(r){
		$('#cf-form_sended .modal-body').text(r.message);
		$('#cf-form_sended').modal();
	});
	return false;
})