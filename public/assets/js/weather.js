var request = new XMLHttpRequest()

request.open('GET', 'http://api.openweathermap.org/data/2.5/weather?lat=-6.52183&lon=106.807729&appid=83748d0a6885b992ce691deef1349f8c', true)
request.onload = function () {
  // Begin accessing JSON data here
  var data = JSON.parse(this.response);
  var tmp = data.main.temp;
  var str = tmp.toString();
  var temp = str.substring(0,2);
  let condition = data.weather[0].main;
  let icon = data.weather[0].icon;
  let icon_url= `http://openweathermap.org/img/wn/${icon}@2x.png`;
  if (request.status >= 200 && request.status < 400) {
    $('#temp-main').html(`${temp}° | ${condition}`);
    $("#icon-url").attr("src",icon_url);
    console.log(condition)
  } else {
    console.log('error')
  }
}

request.send()
