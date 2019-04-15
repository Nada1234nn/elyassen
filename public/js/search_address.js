google.maps.event.addDomListener(window, 'load', function () {

    var places = new google.maps.places.Autocomplete(document.getElementById('address'));

    places.setComponentRestrictions(
        {'country': 'SA'}
    );

    google.maps.event.addListener(places, 'place_changed', function () {

        var place = places.getPlace();
        var address = place.formatted_address;
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();

        document.getElementById("location").value = JSON.stringify(address);
        document.getElementById("latitude").value = JSON.stringify(latitude);
        document.getElementById("longitude").value = JSON.stringify(longitude);
    });
});