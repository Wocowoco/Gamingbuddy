$(document).ready(function(e) {
  apiCall();
});

function apiCall() {
  $.get(
    "../xampp/omtoer.php",
    { endpoint: "/lol/summoner/v4/summoners/by-name/joeki6" },
    function(data, status) {
      data = JSON.parse(data);
      const app = document.getElementById("root");
      const logo = document.createElement("img");
      const container = document.createElement("div");

      logo.src = "logo.png";
      container.setAttribute("class", "container");

      app.appendChild(logo);
      app.appendChild(container);

      if (status >= 200 && status < 400) {
        Document.write(data);
      } else {
        Document.write(data);
        /*const errorMessage = document.createElement("marquee");
        errorMessage.textContent = `Gah, it's not working!`;
        app.appendChild(errorMessage);*/
      }
    }
  );
}
