function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  // add a zero in front of numbers<10
  m = checkTime(m);
  document.getElementById('time').innerHTML = h + ":" + m;
  t = setTimeout(function() {
    startTime()
  }, 500);
}

startTime();

function gettingJSON(){
    $.getJSON("http://api.openweathermap.org/data/2.5/weather?q=Porto,pt&APPID=5ba10699f154b5870eadc3ff52c88936",function(json){
        document.getElementById("weatherTemp").innerHTML = kelvinToCelsius(json.main.temp) + "ºC";
        checkIcon(json.weather[0].icon);
    });
}

gettingJSON();

function kelvinToCelsius(temp){
    return temp - 272.15;
}


function checkIcon(iconID){
    var iconPlace = document.getElementById("weatherIcon");
    
    if (iconID === "01d"){
        iconPlace.className = "wi wi-day-sunny";
    } else if (iconID === "01n"){
        iconPlace.className = "wi wi-night-clear";
    }  else if (iconID === "02d"){
        iconPlace.className = "wi wi-day-cloudy";
    } else if (iconID === "02n"){
        iconPlace.className = "wi wi-night-alt-cloudy";
    } else if (iconID === "03d" || iconID === "03n"){
        iconPlace.className = "wi wi-cloud";
    } else if (iconID === "04d" || iconID === "04n"){
        iconPlace.className = "wi wi-cloudy";
    }  else if (iconID === "09d" || iconID === "09n"){
        iconPlace.className = "wi wi-showers";
    }  else if (iconID === "10d"){
        iconPlace.className = "wi wi-day-rain";
    } else if (iconID === "10n"){
        iconPlace.className = "wi wi-night-alt-showers";
    } else if (iconID === "11d"){
        iconPlace.className = "wi wi-day-thunderstorm";
    } else if (iconID === "11n"){
        iconPlace.className = "wi wi-night-alt-thunderstorm";
    } else if (iconID === "13d"){
        iconPlace.className = "wi wi-day-snow";
    } else if (iconID === "13n"){
        iconPlace.className = "wi wi-night-snow";
    } else if (iconID === "50d" || iconID === "50n"){
        iconPlace.className = "wi wi-windy";
    } else {
        iconPlace.className = "wi wi-na";
    }
}