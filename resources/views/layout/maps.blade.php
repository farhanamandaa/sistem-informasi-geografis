<div class="row justify-content-center">
	<h1>My First Google Map</h1>

	<div style="width: 1000px; height: 500px;" id="map">
		{!! Mapper::render() !!}
	</div>
	
</div>

<script type="text/javascript">
function addMarker(map)
{
	google.maps.event.addListenerOnce(map, 'click', function(event) {
	   placeMarker(event.latLng);
	});

	function placeMarker(location) {
	    var marker = new google.maps.Marker({
	        position: location, 
	        map: map
	    });
	}
}
</script>


