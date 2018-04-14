<div class="col-md-10">

		<div style="width: 1000px; height: 630px;" id="map">
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


