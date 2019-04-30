var initMap = function() {
	var map = new google.maps.Map(document.querySelector('#map'), {
		center: { lat: 31.2338629, lng: 29.9697097 },
		zoom: 18
	});
};

document.addEventListener('DOMContentLoaded', function() {
	var options = {};
	var elems = document.querySelectorAll('.modal');
	var instances = M.Modal.init(elems, options);
});
