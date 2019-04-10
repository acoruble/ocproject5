jQuery(document).ready(function($) {
  var maLatitude;		/*Variable gobale contenant la latitude*/
  var maLongitude;	/*Variable gobale contenant la longitude*/

  if (navigator.geolocation)
  navigator.geolocation.getCurrentPosition(showPosition);
  else
  alert("Votre navigateur ne prend pas en compte la géolocalisation HTML5");

  function showPosition(position){
    maLatitude= position.coords.latitude;
    maLongitude= position.coords.longitude;

    $.ajax({
      url : "https://api.openweathermap.org/data/2.5/weather?lat="+maLatitude+"&lon="+maLongitude+"&units=metric&APPID=b5a3273ceb47a7ba6732e70a7f77dc55",
      dataType : "json",
      success : function(data) {
        console.log("donnees api",data)
        var temp = data.main.temp;
        var iconcode = data.weather[0].icon;
        var iconurl = "http://openweathermap.org/img/w/" + iconcode + ".png";
        $('#wicon').attr('src', iconurl);
        var name = data.name;
        var element = document.getElementById("zone_meteo");
        element.innerHTML = "À " + name +", il fait " + temp +"°C.";
      }
    });
  }

});
