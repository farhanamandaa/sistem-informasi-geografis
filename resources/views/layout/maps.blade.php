	<div class="col-md-10">

	<div style="width: 1000px; height: 630px;" id="map">
		{!! Mapper::render() !!}
	</div>

	<div id="legend">
		<h3>Keterangan :</h3>
	</div>

	<div id="floating-panel">
		<select id="start">
			@foreach ($showLocation as $location)
				<option value="{{ $location->name }}">{{ $location->name }}</option>
			@endforeach
		</select>
		<select id="end">
			@foreach ($showLocation as $location)
				<option value="{{ $location->name }}">{{ $location->name }}</option>
			@endforeach
		</select>
	</div>
		
</div>
<script type="text/javascript">
	function initLegend(map){

		var directionsService = new google.maps.DirectionsService;
		var directionsDisplay = new google.maps.DirectionsRenderer;

		var icons = 
		{
			museum : {
				name : 'Museum',
				icon : 'storage/1.png'
			},
			taman  : {
				name : 'Taman',
				icon : 'storage/2.png'
			} 
		};

		var legend = document.getElementById('legend');
		for (var key in icons)
		{
			var type = icons[key];
			var name = type.name;
			var icon = type.icon;
			var div  = document.createElement('div');
			div.innerHTML = '<img src="'+ icon + '">' + name;
			legend.appendChild(div); 
		}

		map.controls[google.maps.ControlPosition.LEFT_CENTER].push(legend);
		
		var control = document.getElementById('floating-panel');
        control.style.display = 'block';
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);


		$("#legend").show(); /*Show legend after map loaded*/

		
		directionsDisplay.setMap(map);

		var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);

		getCurrentLocation(map);

		function getCurrentLocation(map)
	    {   
	    	$("#getlocation").click(function(){
		        if (navigator.geolocation) {
		            navigator.geolocation.getCurrentPosition(
		                function(position) {
		                    var pos = {
		                        lat: position.coords.latitude,
		                        lng: position.coords.longitude
		                    };

		                    var marker = new google.maps.Marker({
		                      position: pos,
		                      map: map,
		                      title: "Location found."
		                    });

		                    map.setCenter(pos);
		                    map.panTo(pos);
		                    $('#start').append($('<option>', {
    							value: [pos.lat,pos.lng],
    							text: 'Lokasi Saya'
								}));
		                    // map.setZoom(16);
		                }
		            );
		        }
		    });
		}

		function calculateAndDisplayRoute(directionsService, directionsDisplay) {
	        directionsService.route({
	          origin: document.getElementById('start').value,
	          destination: document.getElementById('end').value,
	          travelMode: 'DRIVING'
	        }, function(response, status) {
	          if (status === 'OK') {
	            directionsDisplay.setDirections(response);
	          } else {
	            window.alert('Directions request failed due to ' + status);
	          }
	        });
      	}
	}


</script>


