<?php include_once('connection.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Places Searchbox</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
    </style>
  </head>
  <body>
    <input id="pac-input" class="controls" type="text" placeholder="Search Box" value="Isulan">
    <div id="map"></div>
    <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 6.635327, lng: 124.597566},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);


        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve

        var bambad = {lat: 6.588928, lng: 124.602149};
        var bual = {lat: 6.632079, lng: 124.511595};
        var dansuli = {lat: 6.650981, lng: 124.591813};
        var impao = {lat: 6.663735, lng: 124.580186};
        var kalawag1 = {lat: 6.621830, lng: 124.603216};
        var kalawag2 = {lat: 6.634582, lng: 124.603233};
        var kalawag3 = {lat: 6.624083, lng: 124.593007};
        var kenram = {lat: 6.654461, lng: 124.615035};
        var kolambog = {lat: 6.555049, lng: 124.605744};
        var kudanding = {lat: 6.584004, lng: 124.625303};
        var lagandang = {lat: 6.611049, lng: 124.370890};
        var laguilayan = {lat: 6.670126, lng: 124.524370};
        var mapantig = {lat: 6.678566, lng: 124.589829};
        var newpangasinan = {lat: 6.622935, lng: 124.56096};
        var sampao = {lat: 6.636920, lng: 124.609341};
        var tayugo = {lat: 6.639484, lng: 124.564166};

        var marker1 = new google.maps.Marker({
          position: bambad,
          map: map,
          title: 'bambad'
        });

        var marker2 = new google.maps.Marker({
          position: bual,
          map: map,
          title: 'bual'
        });

        var marker3 = new google.maps.Marker({
          position: dansuli,
          map: map,
          title: 'dansuli'
        });

        var marker4 = new google.maps.Marker({
          position: impao,
          map: map,
          title: 'impao'
        });

        var marker5 = new google.maps.Marker({
          position: kalawag1,
          map: map,
          title: 'kalawag1'
        });

        var marker6 = new google.maps.Marker({
          position: kalawag2,
          map: map,
          title: 'kalawag2'
        });

        var marker7 = new google.maps.Marker({
          position: kalawag3,
          map: map,
          title: 'kalawag3'
        });

        var marker8 = new google.maps.Marker({
          position: kenram,
          map: map,
          title: 'kenram'
        });

        var marker9 = new google.maps.Marker({
          position: kolambog,
          map: map,
          title: 'kolambog'
        });

        var marker10 = new google.maps.Marker({
          position: kudanding,
          map: map,
          title: 'kudanding'
        });

        var marker11 = new google.maps.Marker({
          position: lagandang,
          map: map,
          title: 'lagandang'
        });

        var marker12 = new google.maps.Marker({
          position: laguilayan,
          map: map,
          title: 'laguilayan'
        });

        var marker13 = new google.maps.Marker({
          position: mapantig,
          map: map,
          title: 'mapantig'
        });

        var marker14 = new google.maps.Marker({
          position: newpangasinan,
          map: map,
          title: 'newpangasinan'
        });

        var marker15 = new google.maps.Marker({
          position: sampao,
          map: map,
          title: 'sampao'
        });

        var marker16 = new google.maps.Marker({
          position: tayugo,
          map: map,
          title: 'tayugo'
        });



         google.maps.event.addListener(marker1, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=5";
         });

         google.maps.event.addListener(marker2, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=6";
         });

         google.maps.event.addListener(marker3, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=7";
         });

         google.maps.event.addListener(marker4, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=8";
         });

         google.maps.event.addListener(marker5, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=9";
         });

         google.maps.event.addListener(marker6, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=10";
         });

         google.maps.event.addListener(marker7, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=11";
         });

         google.maps.event.addListener(marker8, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=12";
         });

         google.maps.event.addListener(marker9, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=13";
         });

         google.maps.event.addListener(marker10, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=14";
         });

         google.maps.event.addListener(marker11, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=15";
         });

         google.maps.event.addListener(marker12, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=16";
         });

         google.maps.event.addListener(marker13, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=17";
         });

         google.maps.event.addListener(marker14, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=18";
         });

         google.maps.event.addListener(marker15, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=19";
         });

         google.maps.event.addListener(marker16, 'click',function()
         {
          window.location.href = "list-of-household-in-map.php?barangayid=20";
         });





        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABvSJvdyLH5WVGWMjs424sKvLrAoPBkxc&libraries=places&callback=initAutocomplete"
         async defer>
           

           $("document").ready(function() {
    setTimeout(function() {
        $("#pac-input").trigger('click');
    },10);


         </script>
  </body>
</html>