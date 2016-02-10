//intialize the map
function initialize() {
  var mapOptions = {
    zoom: 13,
    center: new google.maps.LatLng(-36.845, 174.76)
};

var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);


// MARKERS
/****************************************************************/

//add a marker1
var marker = new google.maps.Marker({
    position: {lat: -36.844752, lng: 174.767761},
    map: map,
    icon: 'themes/assan/img/pin.png'
});


// INFO BOXES
/****************************************************************/

//show info box for marker1
var contentString = '<h4>Envirospec Office</h4>';

var infowindow = new google.maps.InfoWindow({ content: contentString });

google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

}

google.maps.event.addDomListener(window, 'load', initialize);