<!DOCTYPE html>
<html>
<head>
    <title>Google Maps JavaScript API Example</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script>
        function initMap() {
            var myLatLng = {lat: 10.34, lng: 37.73};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });
        }
    </script>
</head>
<body onload="initMap()">
    <div id="map" style="height: 500px; width: 100%;"></div>
</body>
</html>