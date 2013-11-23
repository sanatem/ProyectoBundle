var map;
var markersArray = [];

function initialize() {
  var haightAshbury = new google.maps.LatLng(-34.914998,-57.948164);
  var mapOptions = {
    zoom: 5,
    center: haightAshbury,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map =  new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

  google.maps.event.addListener(map, 'click', function(event) {
    addMarker(event.latLng);
  });
}
function initialize2(valor, valor2) {
  var haightAshbury = new google.maps.LatLng(valor,valor2);
  var mapOptions = {
    zoom: 5,
    center: haightAshbury,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map =  new google.maps.Map(document.getElementById("map-canvass"), mapOptions);
  addMarker(haightAshbury);
  google.maps.event.addListener(map, 'click', function(event) {
    addMarker(event.latLng);
  });
}

function addMarker(location) {
  marker = new google.maps.Marker({
    position: location,
    map: map
  });
  elem = document.getElementById("lat");
elem.value = marker.position.lat();
elem2= document.getElementById("lon");
elem2.value= marker.position.lng();
  markersArray.push(marker);

}


function clearOverlays() {
  if (markersArray) {
    for (i in markersArray) {
      markersArray[i].setMap(null);
    }
  }
}

function showOverlays() {
  if (markersArray) {
    for (i in markersArray) {
      markersArray[i].setMap(map);
    }
  }
}


function deleteOverlays() {
  if (markersArray) {
    for (i in markersArray) {
      markersArray[i].setMap(null);
    }
    markersArray.length = 0;
  }
}
