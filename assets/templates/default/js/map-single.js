 function singleMap() {
    var myLatLng = {
        lng: $('#singleMap').data('longitude'),
        lat: $('#singleMap').data('latitude'),
    };
    var single_map = new google.maps.Map(document.getElementById('singleMap'), {
        zoom: 12,
        center: myLatLng,
        scrollwheel: false,
        zoomControl: false,
        fullscreenControl: true,
        mapTypeControl: false,
        scaleControl: false,
        panControl: false,
        navigationControl: false,
        streetViewControl: true,
        styles:  [
    {
        "featureType": "all",
        "elementType": "labels.text",
        "stylers": [
            {
                "color": "#878787"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f9f5ed"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f5f5f5"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#c9c9c9"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#aee0f4"
            }
        ]
    }
]

    });
var marker = new google.maps.Marker({
    position: myLatLng, 
    map: single_map, 
    icon: 'images/marker.png',
    draggarble: false
});
var scrollEnabling = $('.scrollContorl');
$(scrollEnabling).on("click", function (e) {
    e.preventDefault();
    $(this).toggleClass("enabledsroll");

    if ($(this).is(".enabledsroll")) {
        single_map.setOptions({
            'scrollwheel': true
        });
    } else {
        single_map.setOptions({
            'scrollwheel': false
        });
    }
});
	function changeMarkerPos(lat, lon){
		myLatLng = new google.maps.LatLng(lat, lon)
		marker.setPosition(myLatLng);
		single_map.panTo(myLatLng);
	}	
	$(".map-link").on("click", function (a) {
		a.preventDefault();
		$(".map-link").removeClass("ml_act");
		var tdInit = $(this).data('linklat');
		var tdInit2 = $(this).data('linklong');
		$(this).addClass("ml_act");
		changeMarkerPos(tdInit, tdInit2);
	});
	$(".map-links_tabs-title").on("click", function () {
		$(this).toggleClass("ml_act_title");
 		$(".map-links_tabs").fadeToggle(400);
	});	 
var zoomControlDiv = document.createElement('div');
var zoomControl = new ZoomControl(zoomControlDiv, single_map);
function ZoomControl(controlDiv, single_map) {
    zoomControlDiv.index = 1;
    single_map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
    controlDiv.style.padding = '5px';
    var controlWrapper = document.createElement('div');
    controlDiv.appendChild(controlWrapper);
    var zoomInButton = document.createElement('div');
    zoomInButton.className = "mapzoom-in";
    controlWrapper.appendChild(zoomInButton);
    var zoomOutButton = document.createElement('div');
    zoomOutButton.className = "mapzoom-out";
    controlWrapper.appendChild(zoomOutButton);
    google.maps.event.addDomListener(zoomInButton, 'click', function () {
        single_map.setZoom(single_map.getZoom() + 1);
    });
    google.maps.event.addDomListener(zoomOutButton, 'click', function () {
        single_map.setZoom(single_map.getZoom() - 1);
    });
} 
}
var single_map = document.getElementById('singleMap');
if (typeof (single_map) != 'undefined' && single_map != null) {
    google.maps.event.addDomListener(window, 'load', singleMap);
}