$(document).ready(function($) {

	// On hide la div add
	$('#add').hide();
	$('#successBox').hide();
	// Lors du click sur ajouter, on le fait apparaître


	$('#boutonAdd, #boutonClose').click(function() {
		$('#add').toggle("blind");
		$(this).parent().toggleClass("active");
	});


	$('.bs-docs-sidenav li').click(function(){
		$(this).parent().find('li.active').toggleClass('active');
		$(this).toggleClass('active');		
	})

	$('#formAdd').submit(function() {
		var form = $(this).serializeObject();
		$.ajax({
			url: 'entry.php',
			type: 'POST',
			dataType: 'json',
			data: form,
			success: function(data, textStatus, xhr) {
				$('#add').toggle("blind");
				$("#boutonAdd").parent().toggleClass("active");
				$('#successBox').show('blind');
				$('#successBoxText').text("L'entrée a été ajoutée avec succès !")
			},
		});

		return false;
	})


});


$.fn.serializeObject = function() {
	var o = {};
	var a = this.serializeArray();
	$.each(a, function() {
		if (o[this.name]) {
			if (!o[this.name].push) {
				o[this.name] = [o[this.name]];
			}
			o[this.name].push(this.value || '');
		} else {
			o[this.name] = this.value || '';
		}
	});
	return o;
};