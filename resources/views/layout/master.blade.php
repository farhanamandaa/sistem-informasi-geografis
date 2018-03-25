  <html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Blog Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
  <link href="/css/blog.css" rel="stylesheet">
</head>

<body>
  <div class="container">

    @include('layout.header')   

    <div class="container">
      <div class="row">
        
        @include('layout.maps')

      </div>
    </div>
  </div>

<script>
  function myMap() {
  var mapProp= 
  {
    center:new google.maps.LatLng(-6.2514151,106.8918973),
    zoom:5,
  };

  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYRqW7I9EYdPJZOqiLqTX5QNNx5MlxoE8&callback=myMap"></script>

</body>
</html>