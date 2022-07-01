const cinemas = new Map();

c.forEach( function fun(element) {
    key = Object.keys(element)[0]
     cinemas[key] =  element[key]
  
  }  
);

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(
    (e) => {
      const { latitude } = e.coords;
      const { longitude } = e.coords;
      const coords = [latitude, longitude];

      const map = L.map("map").setView(coords, 13);
      const circle = L.circle(coords, {
        color: "rgb(81, 196, 211)",
        fillColor: "rgba(81, 196, 211,0.6)",
        fillOpacity: 0.5,
        radius: 5000,
      }).addTo(map);

      const cinemaPin = L.icon({
        iconUrl:
          "images/imgbin_computer-icons-movie-projector-film-cinema-png.png",
        iconSize: [40, 40],
        iconAnchor: [22, 94],
        shadowAnchor: [4, 62],
        popupAnchor: [-3, -76],
      });

      L.tileLayer("https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png", {
        attribution:
          '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(map);
      //curren location
      L.marker(coords).addTo(map).bindPopup("Your Location 👋").openPopup();

      for (let [cinemaName, cinemaCoords] of Object.entries(cinemas)) {
        L.marker(cinemaCoords, { icon: cinemaPin })
          .addTo(map)
          .bindPopup(
            `<a href="https://www.google.com/maps/dir/${coords}/${cinemaName}" target="_blank">${cinemaName}</a> 🎦`
          );
      }
    },
    function () {
      alert("Could not get your location");
    }
  );
}
