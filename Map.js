function initialize()
{
    var myCenter=new google.maps.LatLng(40.10933, -88.22708);
    var cravings=new google.maps.LatLng(40.11133, -88.22908);
    var bobo=new google.maps.LatLng(40.11039, -88.23320);
    var lailai=new google.maps.LatLng(40.11036, -88.23338);
    var evo=new google.maps.LatLng(40.10946, -88.23060);
    var mandarin=new google.maps.LatLng(40.11001, -88.23307);
    var empire=new google.maps.LatLng(40.11038, -88.23239);

    var myRestaurant = new Array(cravings, bobo, lailai, evo, mandarin, empire);

    var mapProp = {
        center: myCenter,
        zoom:14,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

    for (var i=0; i<myRestaurant.length; i++) {
        addMarker(map, myRestaurant[i]);
    };
}

function addMarker(map, markProp){
    var marker=new google.maps.Marker({
        position:markProp,
        icon:'image/marker.png',
        animation:google.maps.Animation.DROP
    });
    var infowindow = new google.maps.InfoWindow({
        content: "..."
    });
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
        
    })
    marker.setMap(map);
}

function loadScript()
{
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyBH5nIq8RUkBRCCEJzJ-ovyMDh9rMkeStU&sensor=false&callback=initialize";
    document.body.appendChild(script);
}

window.onload = loadScript;
