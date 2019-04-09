// jQuery(document).ready(function($) {
//   var maLatitude;		/*Variable gobale contenant la latitude*/
//   var maLongitude;	/*Variable gobale contenant la longitude*/
//
//   if (navigator.geolocation)
//     navigator.geolocation.getCurrentPosition(showPosition);
//   else
//   alert("Votre navigateur ne prend pas en compte la géolocalisation HTML5");
//   });
//
//   function showPosition(position){
//     maLatitude= position.coords.latitude;
//     maLongitude= position.coords.longitude;
//     alert(maLatitude + ", " + maLongitude );
// }

// Dans la même balise script que la géolocalisation!
window.onload = function buttonClickGET() {
  var url ="https://api.openweathermap.org/data/2.5/weather?lat=47.6982&lon=-0.0755&APPID=b5a3273ceb47a7ba6732e70a7f77dc55";
  $.get(url, callBackGetSuccess).done(function() {
    //alert("second sucess");
  })
  .fail(function() {
    alert("error");
  })
  .always(function() {
    //alert("finished");
  });
}

var callBackGetSuccess = function(data) {
  console.log("donnees api",data)
  var temp = Math.round(fToC(data.main.temp)/10);
  var iconcode = data.weather[0].icon;
  var iconurl = "http://openweathermap.org/img/w/" + iconcode + ".png";
  $('#wicon').attr('src', iconurl);
  var element = document.getElementById("zone_meteo");
  element.innerHTML = "À La Flèche, il fait " + temp +"°C.";
}

function fToC(fahrenheit)
{
  var fTemp = fahrenheit;
  var fToCel = (fTemp - 32) * 5 / 9;
  return fToCel
}
