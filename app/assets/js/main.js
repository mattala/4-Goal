var initMap = function() {
	var map = new google.maps.Map(document.querySelector('#map'), {
		center: { lat: 31.2338629, lng: 29.9697097 },
		zoom: 18
	});
};
$(document).ready(function() {
	$('select').formSelect();
});

$(document).ready(function() {
	$('.collapsible').collapsible();
});

$(document).ready(function() {
	$('#password').change(function() {
		var pw = $('#password').val();
		if (pw.length < 8) {
			$('#password').addClass('invalid');
			$('#pw-len').html('Password must be at least 8 characters.');
		} else {
			$('#password').addClass('valid');
			$('#pw-len').html('');
		}
	});

	$('#password_confirm').keyup(function() {
		if ($('#password').val() != $('#password_confirm').val()) {
			$('#password_confirm').addClass('invalid');
			$('#pw-match').html('Password must match.');
		} else {
			$('#password_password').addClass('valid');
			$('#pw-match').html('');
		}
	});
});
