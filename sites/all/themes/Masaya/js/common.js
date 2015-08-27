/***********BO FOOTER MAP SECTION***********/
var map;
var map2;
var map3;
var map4;
var mymap;
var geocoder;

function initialize()
{

    geocoder = new google.maps.Geocoder();

      var latlng = new google.maps.LatLng(4.596626, -74.0700784);      // Bagota
      var latlng1 = new google.maps.LatLng(11.189226, -74.219494);    // Santa Marta

      var mapOptions = {
          zoom: 12,
          center: latlng,
          mapTypeControl: true,
          mapTypeControlOptions: {
              style: google.maps.MapTypeControlStyle.DEFAULT,
              mapTypeIds: [
                  google.maps.MapTypeId.ROADMAP,
                  google.maps.MapTypeId.TERRAIN
              ]
          },
          zoomControl: true,
          zoomControlOptions: {
              style: google.maps.ZoomControlStyle.SMALL
          }
      };
      var mapOptions1 = {
          zoom: 8,
          center: latlng1,
          mapTypeControl: true,
          mapTypeControlOptions: {
              style: google.maps.MapTypeControlStyle.DEFAULT,
              mapTypeIds: [
                  google.maps.MapTypeId.ROADMAP,
                  google.maps.MapTypeId.TERRAIN
              ]
          },
          zoomControl: true,
          zoomControlOptions: {
              style: google.maps.ZoomControlStyle.SMALL
          }
      };



      map  = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);          // Bagota Map Desktop
      map2 = new google.maps.Map(document.getElementById("map_canvas_2"), mapOptions1);       // Santa Marta Map Desktop
      //map3 = new google.maps.Map(document.getElementById("map_canvas_mob"), mapOptions);      // Bagota Map Mobile
      //map4 = new google.maps.Map(document.getElementById("map_canvas_mob_2"), mapOptions1);   // Santa Marta Map Mobile




      var marker = new google.maps.Marker({
          position: latlng,
          map: map,
          title: 'Bogotá'
      });
      var marker = new google.maps.Marker({
          position: latlng1,
          map: map2,
          title: 'Santa Marta'
      });
      /*var marker = new google.maps.Marker({
          position: latlng,
          map: map3,
          title: 'Bogotá'
      });
      var marker = new google.maps.Marker({
          position: latlng1,
          map: map4,
          title: 'Santa Marta'
      });*/

}
google.maps.event.addDomListener(window, 'load',initialize);

// Bagota Map for Desktop
function codeAddress(addr) {
    var address = addr;

    /*We are passing static latlong for the Footer maps because physical address does not resolve exact lat longs... */
     var lat = parseFloat(4.596589);
     var lng = parseFloat(-74.070029);

     var latlng = new google.maps.LatLng(lat, lng);

     geocoder.geocode( { 'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
               map.setZoom(15);
               marker = new google.maps.Marker({
                   position: latlng,
                   map: map
               });
               infowindow.setContent(results[1].formatted_address);
               infowindow.open(map, marker);
             } else {
               alert('No results found');
             }
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
}

// Santa Marta Map for Desktop
function codeAddres(addr) {
    var address = addr;

    /*We are passing static latlong for the Footer maps because physical address does not resolve exact lat longs... */
     var lat = parseFloat(11.2446091);
     var lng = parseFloat(-74.2106398);

     var latlng = new google.maps.LatLng(lat, lng);

     geocoder.geocode( { 'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
               map.setZoom(15);
               marker = new google.maps.Marker({
                   position: latlng,
                   map: map2
               });
               infowindow.setContent(results[1].formatted_address);
               infowindow.open(map2, marker);
             } else {
               alert('No results found');
             }
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
}

jQuery(document).ready(function(){
    jQuery('a#resize_map1').click(function (e) {
        var center = map.getCenter();
        console.log('working');
        window.setTimeout(google.maps.event.trigger(map, 'resize'), 2000); //this fix the problem with not completely map
        console.log('working');
        map.setCenter(center);
        map.setZoom(15);
    });
    jQuery('#resize_map2').click(function (e){
        //codeAddres('Masaya Hostel Santa Marta');
        var center = map2.getCenter();
        console.log('working');
        google.maps.event.trigger(map2, "resize"); //this fix the problem with not completely map
        map2.setCenter(center);
    });
    // jQuery('#resize_map1').click(function (e) {
    //     var center = map.getCenter();
    //     console.log('working');
    //     google.maps.event.trigger(map, 'resize'); //this fix the problem with not completely map
    //     map.setCenter(center);
    //     map.setZoom(15);
    // });
});

/***********EO FOOTER MAP SECTION***********/