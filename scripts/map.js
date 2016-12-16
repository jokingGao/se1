var map;
      var infowindow;
      function initMap() {
          var myplace = {lat: 40.5359, lng: -74.4155};
          map = new google.maps.Map(document.getElementById('map'), {
          center: myplace,
          zoom: 12
        });
        infowindow = new google.maps.InfoWindow();
        var myinfoWindow = new google.maps.InfoWindow({map: map});
        var pos = {lat: 40.5359, lng: -74.4155};

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            myinfoWindow.setPosition(pos);
            myinfoWindow.setContent('You are here.');
            map.setCenter(pos);
              //Add my location marker
            var marker=new google.maps.Marker({position:pos,
                                              animation: google.maps.Animation.DROP, icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'});
            marker.setMap(map);
              //Search nearby gyms
            var service = new google.maps.places.PlacesService(map);
            service.nearbySearch({
                location: pos,
                radius: 4000,
                types: ['gym']
                }, callback);
            // Add circle overlay and bind to marker
            var circle = new google.maps.Circle({
                map: map,
                radius: 4000, 
                fillColor: '#87CEEB'
                });
            circle.bindTo('center', marker, 'position');
          }, function() {
            handleLocationError(true, myinfoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, myinfoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
          
      function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
      }

      function createMarker(place) {
        var marker = new google.maps.Marker({
          map: map,
          animation: google.maps.Animation.DROP,
          position: place.geometry.location
        });
         marker.addListener('click', function(){
            if (marker.getAnimation() !== null) {
            marker.setAnimation(null); }
            else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
            var service = new google.maps.places.PlacesService(map);
            service.getDetails({
              placeId: place.place_id
              }, function(place) {
                if(place.opening_hours == null){
                  infowindow.setContent('<div><strong><h4>' + place.name + '</h4></strong><br>'
                  + place.formatted_address + '<br>' + 'Sorry, place opening hours not specify.' + '</div>');
                }
                else{
                  var d = new Date();
                  var n = d.getDay();
                  infowindow.setContent('<div><strong><h4>' + place.name + '</h4></strong><br>'
                  + place.formatted_address + '<br>' + 
                  "Today's opening hours:  " + '<strong>' +
                  place.opening_hours.periods[n].open.time.substring(0,2) + ':' +  place.opening_hours.periods[n].open.time.substring(2) + ' - ' +
                  place.opening_hours.periods[n].close.time.substring(0,2) + ':' +  place.opening_hours.periods[n].close.time.substring(2) 
                  + '</strong><br>' +
                  '</div>');
                }               
              });
            infowindow.open(map, this);
            stopAnimation(marker);
          }
        });
       }

      function stopAnimation(marker) {
        setTimeout(function () {
        marker.setAnimation(null);
      }, 2000);
      }
