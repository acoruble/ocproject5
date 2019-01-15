// Lie le champs adresse en champs autocomplete afin que l'API puisse afficher les propositions d'adresses
function initializeAutocomplete(id) {
  var element = document.getElementById(id);
  if (element) {
   var autocomplete = new google.maps.places.Autocomplete(element, { types: ['geocode'] });
   google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
  }
}

// Injecte les données dans les champs du formulaire lorsqu'une adresse est sélectionnée
function onPlaceChanged() {
  var place = this.getPlace();

  for (var i in place.address_components) {
    var component = place.address_components[i];
    for (var j in component.types) {
      var type_element = document.getElementById(component.types[j]);
      if (type_element) {
        type_element.value = component.long_name;
      }
    }
  }

  var longitude = document.getElementById("longitude");
  var latitude = document.getElementById("latitude");
  longitude.value = place.geometry.location.lng();
  latitude.value = place.geometry.location.lat();
}

// Initialisation du champs autocomplete
google.maps.event.addDomListener(window, 'load', function() {
  initializeAutocomplete('user_input_autocomplete_address_2');
});
