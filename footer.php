
    <style>
      #map {
        height: 400px;
        width: 50%;
       }
    </style>

    
    <div class="row">
      <div class="col-lg-offset-4">
        <h3>My Google Maps Demo</h3>
        <div id="map"></div>
      </div>
    </div>
    
    <script>
      function initMap() {
        var uluru = {lat: 52.498605, lng: 13.391799};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7LFO0E29xL1gGh5ODwI_Uac1qNsYkubA&callback=initMap"
  type="text/javascript"></script>

</body>
</html>