var header =    "Origin : https://developer.riotgames.com"
const app = document.getElementById('root');

const logo = document.createElement('img');
logo.src = 'logo.png';

const container = document.createElement('div');
container.setAttribute('class', 'container');

app.appendChild(logo);
app.appendChild(container);

var request = new XMLHttpRequest(header);
request.open('GET', 'https://euw1.api.riotgames.com/lol/summoner/v4/summoners/by-name/donder72?api_key=RGAPI-eccc1289-3cc6-4f7c-aeff-ee8f9508b99b', true);
request.onload = function () {

  // Begin accessing JSON data here
  var data = JSON.parse(this.response);
  if (request.status >= 200 && request.status < 400) {
    Document.write(data);
    } else {
    const errorMessage = document.createElement('marquee');
    errorMessage.textContent = `Gah, it's not working!`;
    app.appendChild(errorMessage);
  }
}
